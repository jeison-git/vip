<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = ['body', 'course_id'];

    //relacion uno a uno inversa answer a contac

    public function contact(){
        return $this->belongsTo('App\Models\Contact');
    } 

}
 