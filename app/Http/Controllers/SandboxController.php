<?php

namespace App\Http\Controllers;

use App\Models\Define;
use App\Models\Modulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SandboxController extends Controller
{
    public function index(Request $request)
    {
        $a = (DB::table(Modulo::TABLE)
            ->select('mod_id')
            ->orderBy('mod_id', 'desc')
            ->first())->mod_id;
        echo '<pre>';
        var_dump($a);
        echo '<pre>';
        exit();
        $modulos = DB::table(Modulo::TABLE)
            ->select('mod_id AS id', 'mod_nombre AS descripcion', 'mod_codigo AS codigo')
            ->where('mod_estado', '=', Modulo::ESTADO_ACTIVO)
            ->where('mod_eliminado', '=', Define::NO_ELIMINADO)
            //->whereNull('mod_padre_id')
            ->orderBy('mod_nombre', 'asc')
            ->get()
            ->prepend(['id' => -1, 'descripcion' => 'Seleccione...'])
            ->toJson();

        return view('sandbox', ['modulos' => $modulos]);

        echo '<pre>';
        var_dump($modulos);
        echo '<pre>';


        //return view('sandbox');
    }
}
