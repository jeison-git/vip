<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employment extends Model
{
    use HasFactory;
    protected $guarded   = ['id', 'status'];

    protected $with = ['images'];

    const BORRADOR   = 1;
    const REVISION   = 2;
    const RESPONDIDO = 3;

    const NOO = 0;
    const SI  = 1;
    
    public function getRouteKeyName()
    {
       return "slug";
    }

    //relacion uno a uno 

    public function application(){
        return $this->hasOne(Application::class);
    }

     //relacion uno a muchos inversa (muchos cursos son de un profesor)
     public function unemployed(){

        return $this->belongsTo(User::class, 'user_id');
    }

    //relacion uno a muchos
    public function references(){

        return $this->hasMany(Reference::class);

    }

    public function oldjobs(){

        return $this->hasMany(Oldjob::class);

    }
    //muchos atraves de 
    public function experiences(){

        return $this->hasManyThrough(Experience::class, Oldjob::class);
    }

    //Relacion uno a muchos polimorfica 
    public function images()
    {

        return $this->morphMany(Image::class, "imageable");
    }

} 
