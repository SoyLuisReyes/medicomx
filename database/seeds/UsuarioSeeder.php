<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Luis Reyes',
            'email' => 'correo@correo.com',
            'password' => Hash::make('admin123'),
        ]);


        $user2 = User::create([
            'name' => 'test2',
            'email' => 'correo2@correo.com',
            'password' => Hash::make('admin123'),
        ]);
    }
}
