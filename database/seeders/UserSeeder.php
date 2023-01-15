<?php

namespace Database\Seeders;

use App\Models\TipoDocumentoIdentidad;
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
        User::create([
            'usu_nombres' => 'Carlos Eduardo',
            'usu_apellido_paterno' => 'Rivera',
            'usu_apellido_materno' => 'Franco',
            'usu_tdi_id' => TipoDocumentoIdentidad::firstWhere('tdi_codigo', '=', 1)->tdi_id,
            'usu_tdi_numero' => '74415678',
            'usu_usuario' => 'carlos',
            'usu_email' => 'carlos_2017_1@hotmail.com',
            'usu_password' => Hash::make('123'),
            'usu_estado' => User::ESTADO_ACTIVO,
            'usu_usu_id_registro' => 1,
            'usu_usu_id_modificado' => 1,
            'usu_ip_registro' => 'Seeders',
            'usu_ip_modificado' => 'Seeders',
        ]);
    }
}
