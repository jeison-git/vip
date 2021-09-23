<?php

namespace Database\Seeders;

use App\Models\Claim;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ClaimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $claims= [
                /*'Aliados Comerciales Vip'*/

                [
                    'commerce_id' => 1,
                    'name'        => 'Meganegocios Vip',
                    'slug'        => Str::slug('Meganegocios Vip'),
                    'description' => 'Todo lo que quieres y necesitas aquí lo consigues',
                    'directions'  => 'Sabanagrande, Caracas',
                ],


                /*Comercios Vip*/
                [
                    'commerce_id' => 2,
                    'name'        => 'Meganegocios Vip',
                    'slug'        => Str::slug('Meganegocios Vip'),
                    'description' => 'Todo lo que quieres y necesitas aquí lo consigues',
                    'directions'  => 'Sabanagrande, Caracas',
                ],



            ];

            foreach ($claims as $claim){

                Claim::create($claim);

            }

        }
    }
}
