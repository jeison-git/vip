<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded= ['id'];


    //Relacion uno a muchos
    public function subcategories(){

        return $this->hasMany(Subcategory::class);

    }

    //Relacion muchos a muchos
    public function brands(){

        return $this->belongsToMany(Brand::class);

    }

    //relacion uno a muchos
    public function product(){
        return $this->hasMany(Product::class);
    }
    
    //Relacion atraves de 
    public function products(){ 

        return $this->hasManyThrough(Product::class, Subcategory::class);

    }

    //url slug
    public function getRouteKeyName()
    {
        return 'slug'; 
    }

    
}
