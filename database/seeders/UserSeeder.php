<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'role_id' => 1,
            'id_card' => 123456789,
            'first_name' => 'Jose',
            'middle_name' => 'Rogelio',
            'last_name' => 'Nieto Prada',
            'address' => 'Av. 3 #5-23',
            'email' => 'roger@gmail.com',
            'phone' => '3132400767',
            'city' => 'Cúcuta',
            'password' => bcrypt('123456789'),
            'email_verified_at' => now(),
        ]);

        User::create([
            'role_id' => 2,
            'id_card' => 987654321,
            'first_name' => 'Silvana',
            'middle_name' => 'Paola',
            'last_name' => 'Patiño Ramon',
            'address' => 'Av.6 #4-32 Apto 202',
            'email' => 'silvana@gmail.com',
            'phone' => '3111425367',
            'city' => 'Bogota',
            'password' => bcrypt('123456789'),
            'email_verified_at' => now(),
        ]);


        User::factory(10)->create([]);

    }
}
