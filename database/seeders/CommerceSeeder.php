<?php

namespace Database\Seeders;

use App\Models\Commerce;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CommerceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Commerce::create([

                'name' => '1 Aliados Comerciales Vip',
                'slug' => Str::slug('Aliados Comerciales Vip'),
                'description' => 'Todo lo que necesitas aquí lo consigues',

        ]);

        Commerce::create([

            'name' => ' 2 Comercios Vip',
            'slug' => Str::slug('Comercios Vip'),
            'description' => 'Todo lo que necesitas aquí lo consigues',

        ]); 

    }

}
