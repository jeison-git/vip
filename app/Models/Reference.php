<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    //relacion uno a muchos inversa

    public function employment(){

        return $this->belongsTo(Employment::class);

    }
}
