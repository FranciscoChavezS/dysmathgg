<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Francisco Javier Chávez',
            'email' => 'guero@hotmail.com',
            'password' => bcrypt('chavacheves')
        ]);

        User::factory(99)->create(); //Generar 99 registros de usuarios 
    }
}
