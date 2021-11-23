<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getCompletedAttribute(){
        return $this->users->contains(auth()->user()->id);
    }

    //relacion uno a muchos inversa

    public function oldjobs(){
        return $this->belongsTo(Oldjob::class);

    }

    ///relacion muchos a muchos

    public function users(){

        return $this->belongsToMany(User::class);
    }

    
}