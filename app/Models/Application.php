<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = ['body', 'employment_id'];

    //relacion uno a uno inversa answer a solicitud

    public function employment(){
        return $this->belongsTo(Employment::class);
    } 
}
