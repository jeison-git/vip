<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded   = ['id', 'created_at', 'updated_at', 'status'];

     /* protected $withCount = ['reviews']; Produce errores */
 
    const PENDIENTE = 1;
    const RECIBIDO  = 2;
    const ENVIADO   = 3;
    const ENTREGADO = 4;
    const ANULADO   = 5;

     public function getRatingAttribute(){
        if($this->reviews_count){
            return round($this->reviews->avg('rating'),1);
        }else{
            return 5;
        }        
    } 

    
    //Relacion uno a muchos inversa

    public function claim(){
        return $this->belongsTo(Claim::class);
    }

    public function department(){
        return $this->belongsTo(Department::class); 
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function district(){
        return $this->belongsTo(District::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    /////////////////
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    //function for setup relationship with review table
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    

}
