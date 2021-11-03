<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    use HasFactory;

    public $guarded =  ['id', 'created_at', 'updated_at'];

    //Relacion uno a muchos
    public function products(){

        return $this->hasMany(Product::class);

    }

    //Relacion uno a muchos inversa
    public function commerce(){

        return $this->belongsTo(Commerce::class);

    } 

    public function orders(){
        return $this->hasMany(Order::class);
    }

    //url slug
    public function getRouteKeyName()
    {
        return 'slug'; 
    }

}
