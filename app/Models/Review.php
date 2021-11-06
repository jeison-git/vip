<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'comment'
    ];

    //relacion uno a muchos inversa (reviews muchos comentarios vienen de un usuario)

    public function user(){

        return $this->belongsTo(User::class);

    }
     //function for setup relationship with orderItem table
     public function order()
     { 
         return $this->belongsTo(Order::class);
     }


}
