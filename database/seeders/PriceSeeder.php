<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Price;


class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Price::create([
            'name' => 'Gratis',
            'value' => 0
        ]);

        Price::create([
            'name' => '99.99 MXN (Nivel 1)',
            'value' => 99.99
        ]);

        Price::create([
            'name' => '149.99 MXN (Nivel 2)',
            'value' => 149.99
        ]);

        Price::create([
            'name' => '199.99 MXN (Nivel 3)',
            'value' => 199.99
        ]);
    }
}
