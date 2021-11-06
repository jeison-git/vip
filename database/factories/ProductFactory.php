<?php

namespace Database\Factories;

use App\Models\Claim;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->sentence(2);

        //$category = Category::all()->random();

        $subcategory = Subcategory::all()->random();
        $category = $subcategory->category;
       //$category = Category::all()->random();

        $claim = Claim::all()->random();

        $brand = $category->brands->random();

        if ($subcategory->color){
            $quantity = null;
        }else{
            $quantity = 8;
        }

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->text(),
            'realprice' => $this->faker->randomElement([29.99, 69.99, 299.99, 159.99, 79.99, 129.99]) ,
            'price' => $this->faker->randomElement([19.99, 49.99, 99.99, 0.99, 3.45, 2.03, 7.99, 5.99, 4.00, 9.99, 1.00, 0.01, 2.15]),
            'category_id' => $category->id,
            'subcategory_id' => $subcategory->id,
            'claim_id' => $claim->id,
            'brand_id' => $brand->id,
            'quantity' => $quantity,
            'status' => 2,
        ];
    }
}
