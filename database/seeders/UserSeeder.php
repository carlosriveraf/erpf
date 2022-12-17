<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'nombres' => 'Carlos Eduardo',
                'apellido_paterno' => 'Rivera',
                'apellido_materno' => 'Franco',
                'tdi_id' => 2,
                'tdi_numero' => '74415678',
                'usuario' => 'carlos',
                'email' => 'carlos_2017_1@hotmail.com',
                'password' => Hash::make('123'),
                'estado' => User::ESTADO_ACTIVO,
            ],
        ]);
    }
}
