<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PaymentOrder extends Component
{
    // Componente Pado de orden se usa Cdn Paypal
    use AuthorizesRequests; 

    public $order;

    protected $listeners = ['payOrder'];

    public function mount(Order $order)
    {
        $this->order = $order;
    }

    //Una ves que el pago de la orden cambia de estatus, la policy evita que vuelva a cancelar arroja el error 403
    public function payOrder()
    {
        $this->order->status = 2;
        $this->order->save();

            session()->flash('flash.banner', '¡Gracias por su compra!'); //no funciona devido al error 403 
            return redirect()->route('orders.index');
    }

    public function render()
    {

        $this->authorize('author', $this->order);
        $this->authorize('payment', $this->order);

        $items = json_decode($this->order->content);
        $envio = json_decode($this->order->envio);

        return view('livewire.payment-order', compact('items', 'envio'));
    }
}
