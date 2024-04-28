<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

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
            'name' => 'Administrador',
            'email' => 'admin@accionporigualdad.com',
            'password' => bcrypt('12345678'),
            'created_at' => now(),
            'updated_at' => now(),
        ])->assignRole('Admin');

        User::create([
            'name' => 'Asesora Legal 1',
            'email' => 'asesoralegal1@accionporigualdad.com',
            'password' => bcrypt('12345678'),
            'created_at' => now(),
            'updated_at' => now(),
        ])->assignRole('Abogado');

        User::create([
            'name' => 'Asesora Legal 2',
            'email' => 'asesoralegal2@accionporigualdad.com',
            'password' => bcrypt('12345678'),
            'created_at' => now(),
            'updated_at' => now(),
        ])->assignRole('Abogado');
    }
}
