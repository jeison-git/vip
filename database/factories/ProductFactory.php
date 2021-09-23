<?php

namespace Database\Factories;

use App\Models\Claim;
use App\Models\Product;
use App\Models\Subcategory;
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

        $subcategory = Subcategory::all()->random();
        $category = $subcategory->category;

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
            'pricevip' => $this->faker->randomElement([19.99, 49.99, 99.99]),
            'price' => $this->faker->randomElement([29.99, 69.99, 129.99]),
            'subcategory_id' => $subcategory->id,
            'claim_id' => $claim->id,
            'brand_id' => $brand->id,
            'quantity' => $quantity,
            'status' => 2,
        ];
    }
}
