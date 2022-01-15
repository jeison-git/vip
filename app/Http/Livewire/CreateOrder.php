<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Department;
use App\Models\District;
use App\Models\Order;
use App\Models\City;
use App\Models\Claim;
use App\Models\Review;
use App\Models\User;

class CreateOrder extends Component
{
    //Crear orden de compra 

    public $envio_type = 1;

    public $contact, $phone, $address, $references, $shipping_cost = 0;

    public $departments, $claims, $cities = [], $districts = [];

    public $department_id = "", $city_id = "", $district_id = "", $claim_id = "";


    public $rules = [
        'contact' => 'required',
        'phone' => 'required',
        'envio_type' => 'required'
    ];

    public function mount()
    {
        $this->departments = Department::all();
        $this->claims      = Claim::all();
    }
    //Insertar datos de contacto del usuario
    public function updatedEnvioType($value)
    {
        if ($value == 1) {
            $this->resetValidation([
                'department_id', 'city_id', 'district_id', 'address', 'references'
            ]);
        }

        if ($value == 2) {
            $this->resetValidation([
                'claim_id'
            ]);
        }
    }
    //direcion en caso de entrega a domicilio
    public function updatedDepartmentId($value)
    {
        $this->cities = City::where('department_id', $value)->get();

        $this->reset(['city_id', 'district_id']);
    }

    public function updatedCityId($value)
    {

        $city = City::find($value);

        $this->shipping_cost = $city->cost;

        $this->districts = District::where('city_id', $value)->get();

        $this->reset('district_id');
    }
    // registrar orden de compra y generar orden de pago
    public function create_order()
    {

        $rules = $this->rules;

        if ($this->envio_type == 1) {
            $rules['claim_id'] = 'required';
        }

        if ($this->envio_type == 2) {
            $rules['department_id'] = 'required';
            $rules['city_id'] = 'required';
            $rules['district_id'] = 'required';
            $rules['address'] = 'required';
            $rules['references'] = 'required';
        }

        $this->validate($rules);

        $order = new Order();

        $order->user_id = auth()->user()->id;
        $order->contact = $this->contact;
        $order->phone = $this->phone;
        $order->envio_type = $this->envio_type;
        $order->shipping_cost = 0; 
       /*  $order->total = $this->shipping_cost + Cart::subtotal(); Error: A non well formed numeric value encountered */
       /*  $order->total = $this->shipping_cost + floatval(implode(explode(',',Cart::subtotal()))); */
        $order->total = floatval(implode(explode(',',$this->shipping_cost))) + floatval(implode(explode(',',Cart::subtotal())));
        $order->content = Cart::content();

        if ($this->envio_type == 1) {
            $order->envio = json_encode([
                'claim'   => Claim::find($this->claim_id)->address,
            ]);
        }

        if ($this->envio_type == 2) {
            $order->shipping_cost = $this->shipping_cost;
            /* $order->department_id = $this->department_id;
            $order->city_id = $this->city_id;
            $order->district_id = $this->district_id;
            $order->address = $this->address; 
            $order->references = $this->references; */
            $order->envio = json_encode([
                'department' => Department::find($this->department_id)->name,
                'city' => City::find($this->city_id)->name,
                'district' => District::find($this->district_id)->name,
                'address' => $this->address,
                'references' => $this->references
            ]);
        }

        $order->save();

        foreach (Cart::content() as $item) {
            discount($item);
        }

        Cart::destroy(); 

        $mensaje = "!Usted a Creado un Pedido¡ Puede realizar el pago en efectivo, dirigiéndose a uno 
        de nuestros Aliados Comerciales Vip de su preferencia.No Olvide Su Número de Orden ;) ";

        session()->flash('flash.banner', $mensaje);
        return redirect()->route('orders.payment', $order);
    }

    public function render()
    {

        $comments = Review::where('status', 1)
            ->with('user')
            ->with('order')
            ->inRandomOrder()
            ->limit(5)
            ->get();

        return view('livewire.create-order', compact('comments'));
    }
}
