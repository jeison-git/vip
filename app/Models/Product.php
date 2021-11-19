<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Builder;

class Product extends Model
{
    use HasFactory;

    const BORRADOR  = 1;
    const PUBLICADO = 2;

    public $guarded =  ['id', 'created_at', 'updated_at'];

    protected $with = ['category', 'subcategory', 'images'];

    //accesores    

    public function getStockAttribute()
    {
        if ($this->subcategory->size) {
            return  ColorSize::whereHas('size.product', function (Builder $query) {
                $query->where('id', $this->id);
            })->sum('quantity');
        } elseif ($this->subcategory->color) {
            return  ColorProduct::whereHas('product', function (Builder $query) {
                $query->where('id', $this->id);
            })->sum('quantity');
        } else {

            return $this->quantity;
        }
    }

    //Query Scopes // filtrado de categorias, subcategorias y marcas
    public function scopeCategory($query, $category_id)
    {
        if ($category_id) {
            return $query->where('category_id', $category_id);
        }
    }
    public function scopeSubcategory($query, $subcategory_id)
    {
        if ($subcategory_id) {
            return $query->where('subcategory_id', $subcategory_id);
        }
    }
    public function scopeBrand($query, $brand_id)
    {
        if ($brand_id) {
            return $query->where('brand_id', $brand_id);
        }
    }


    //Relacion uno a muchos
    public function sizes()
    {

        return $this->hasMany(Size::class);
    }

    //Relacion uno a muchos inversa
    public function brand()
    {

        return $this->belongsTo(Brand::class);
    }

    public function category(){

        return $this->belongsTo(Category::class);
        
    }

    public function subcategory()
    {

        return $this->belongsTo(Subcategory::class);
    }

    public function claim()
    {

        return $this->belongsTo(Claim::class);
    }


    //Relacion muchos a muchos
    public function colors() 
    {

        return $this->belongsToMany(Color::class)->withPivot('quantity');
    }   


    //Relacion uno a muchos polimorfica
    public function images()
    {

        return $this->morphMany(Image::class, "imageable");
    }

    //url slug
    public function getRouteKeyName()
    {
        return 'slug';
    }


    ////
    

    public function order()
    {
        return $this->hasMany(Order::class, 'product_id');
    }

}
