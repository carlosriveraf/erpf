<?php

namespace Database\Seeders;

use App\Models\Modulo;
use App\Models\User;
use Illuminate\Database\Seeder;

class ModuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Modulo::create([
            'mod_nombre' => 'Sistema',
            'mod_url' => '/sistema',
            'mod_codigo' => '00001',
            'mod_estado' => Modulo::ESTADO_ACTIVO,
            'mod_usu_id_registro' => User::firstWhere('usu_usuario', '=', 'carlos')->usu_id,
            'mod_usu_id_modificado' => User::firstWhere('usu_usuario', '=', 'carlos')->usu_id,
            'mod_ip_registro' => 'Seeders',
            'mod_ip_modificado' => 'Seeders',
        ]);
        Modulo::create([
            'mod_nombre' => 'Módulos',
            'mod_url' => '/modulos',
            'mod_codigo' => '00002',
            'mod_padre_id' => Modulo::firstWhere('mod_codigo', '=', '00001')->mod_id,
            'mod_estado' => Modulo::ESTADO_ACTIVO,
            'mod_usu_id_registro' => User::firstWhere('usu_usuario', '=', 'carlos')->usu_id,
            'mod_usu_id_modificado' => User::firstWhere('usu_usuario', '=', 'carlos')->usu_id,
            'mod_ip_registro' => 'Seeders',
            'mod_ip_modificado' => 'Seeders',
        ]);
        Modulo::create([
            'mod_nombre' => 'Usuarios',
            'mod_url' => '/usuarios',
            'mod_codigo' => '00003',
            'mod_padre_id' => Modulo::firstWhere('mod_codigo', '=', '00001')->mod_id,
            'mod_estado' => Modulo::ESTADO_ACTIVO,
            'mod_usu_id_registro' => User::firstWhere('usu_usuario', '=', 'carlos')->usu_id,
            'mod_usu_id_modificado' => User::firstWhere('usu_usuario', '=', 'carlos')->usu_id,
            'mod_ip_registro' => 'Seeders',
            'mod_ip_modificado' => 'Seeders',
        ]);
    }
}
