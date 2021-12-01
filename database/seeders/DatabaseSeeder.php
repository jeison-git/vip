<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Storage::deleteDirectory('categories');
        Storage::deleteDirectory('subcategories');
        Storage::deleteDirectory('banners');
        Storage::deleteDirectory('allies');
        Storage::deleteDirectory('products');
        

        Storage::makeDirectory('categories');
        Storage::makeDirectory('subcategories');  
        Storage::makeDirectory('banners');      
        Storage::makeDirectory('allies');
        Storage::makeDirectory('products');

        $this->call(PermissionSeeder::class);
        
        $this->call(RoleSeeder::class);
        
        $this->call(UserSeeder::class);

        $this->call(CategorySeeder::class);

        $this->call(SubcategorySeeder::class);

        $this->call(BannerSeeder::class);

        $this->call(CommerceSeeder::class);

        $this->call(ClaimSeeder::class);

        $this->call(ProductSeeder::class);

        $this->call(ColorSeeder::class);

        $this->call(SizeSeeder::class);

        $this->call(ColorSizeSeeder::class);

        $this->call(DepartmentSeeder::class);

        $this->call(PaymentPlatformsTableSeeder::class);
        
        $this->call(CurrenciesTableSeeder::class);

        $this->call(PlanSeeder::class);
        
    }
}
