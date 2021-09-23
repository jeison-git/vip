<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commerce extends Model
{
    use HasFactory;

    public $guarded =  ['id', 'created_at', 'updated_at'];

     //Relacion uno a muchos
     public function claims(){

        return $this->hasMany(Claim::class);

    }

    /*//Relacion muchos a muchos
    public function brands(){

        return $this->belongsToMany(Brand::class);

    }*/

    //Relacion atraves de
    public function products(){

        return $this->hasManyThrough(Product::class, Claim::class);

    }


}
