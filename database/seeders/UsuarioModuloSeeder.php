<?php

namespace Database\Seeders;

use App\Models\Modulo;
use App\Models\User;
use App\Models\UsuarioModulo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioModuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UsuarioModulo::create([
            'um_usu_id' => User::firstWhere('usu_usuario', '=', 'carlos')->usu_id,
            'um_mod_id' => Modulo::firstWhere('mod_codigo', '=', '00001')->mod_id,
            'um_estado' => UsuarioModulo::ESTADO_ACTIVO,
        ]);
        UsuarioModulo::create([
            'um_usu_id' => User::firstWhere('usu_usuario', '=', 'carlos')->usu_id,
            'um_mod_id' => Modulo::firstWhere('mod_codigo', '=', '00002')->mod_id,
            'um_estado' => UsuarioModulo::ESTADO_ACTIVO,
        ]);
    }
}
