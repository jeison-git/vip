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
    { {
            $claims = [
                /*'Aliados Comerciales Vip'*/

                [
                    'commerce_id'  => 1,
                    'name'         => 'Aliados Meganegocios Vip',
                    'slug'         => Str::slug('Meganegocios Vip'),
                    'icon'         => '<img src="https://img.icons8.com/external-itim2101-flat-itim2101/64/000000/external-payment-digital-marketing-itim2101-flat-itim2101.png"/>',
                    'manager'      => 'Marcos Rodriguez',
                    'document'     => '10.002.123',
                    'number_phone' => '0424.002.123',
                    'email'        => 'meganegocios@meganegociosvip.com',
                    'target'       => 'de todo',
                    'description'  => 'Todo lo que quieres y necesitas aquí lo consigues',
                    'address'      => 'Sabanagrande, Caracas',
                    'observation'  => 'local muy angosto',
                ],


                /*Comercios Vip*/
                [
                    'commerce_id' => 2,
                    'name'        => 'Comercio Meganegocios Vip',
                    'slug'         => Str::slug('Meganegocios Vip'),
                    'icon'         => '<img src="https://img.icons8.com/external-itim2101-flat-itim2101/64/000000/external-payment-digital-marketing-itim2101-flat-itim2101.png"/>',
                    'manager'      => 'Marcos Rodriguez',
                    'document'     => '10.002.123',
                    'number_phone' => '0424.002.123',
                    'email'        => 'meganegocios@meganegociosvip.com',
                    'target'       => 'de todo',
                    'description'  => 'Todo lo que quieres y necesitas aquí lo consigues',
                    'address'      => 'Sabanagrande, Caracas',
                    'observation'  => 'local muy angosto',
                ],

                 /*Comercios otros*/
                 [
                    'commerce_id' => 2,
                    'name'        => 'Comercio Aliado prueba 1',
                    'slug'         => Str::slug('Comercio Aliado prueba 1'),
                    'icon'         => '<img src="https://img.icons8.com/external-itim2101-flat-itim2101/64/000000/external-payment-digital-marketing-itim2101-flat-itim2101.png"/>',
                    'manager'      => 'Marcos Rodriguez',
                    'document'     => '10.002.123',
                    'number_phone' => '0424.002.123',
                    'email'        => 'meganegocios@meganegociosvip.com',
                    'target'       => 'de todo',
                    'description'  => 'Todo lo que quieres y necesitas aquí lo consigues',
                    'address'      => 'Av. Casanova, Edif.  (Frente al Gran Café), El Recreo, Caracas',
                    'observation'  => 'local muy angosto',
                ],

                 /*Comercios otros*/
                 [
                    'commerce_id' => 2,
                    'name'        => 'Comercio Aliado prueba 2',
                    'slug'         => Str::slug('Comercio Aliado prueba 2'),
                    'icon'         => '<img src="https://img.icons8.com/external-itim2101-flat-itim2101/64/000000/external-payment-digital-marketing-itim2101-flat-itim2101.png"/>',
                    'manager'      => 'Marcos Rodriguez',
                    'document'     => '10.002.123',
                    'number_phone' => '0424.002.123',
                    'email'        => 'meganegocios@meganegociosvip.com',
                    'target'       => 'de todo',
                    'description'  => 'Todo lo que quieres y necesitas aquí lo consigues',
                    'address'      => 'Av. Casanova, Edif. cochinitos food (Frente al Gran Café), El Recreo, Caracas',
                    'observation'  => 'local muy angosto',
                ],



            ];

            foreach ($claims as $claim) {

                $claim = Claim::factory(1)->create($claim)->first();
            }
        }
    }
}
