<?php

namespace Database\Seeders;

use App\Models\Modulo;
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

        $modulo = Modulo::create([
            'mod_nombre' => 'Sistema',
            'mod_url' => '/sistema',
            'mod_estado' => Modulo::ESTADO_ACTIVO,
        ]);

        $modulo->mod_id;
        
    }
}
