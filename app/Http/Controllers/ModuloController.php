<?php

namespace App\Http\Controllers;

use App\Models\Define;
use App\Models\Modulo;
use Illuminate\Http\Request;

class ModuloController extends Controller
{
    public function index()
    {
        return view('sistema.modulos.index');
    }

    public function listadoModulos(Request $request)
    {
        $callback = $request->input('callback');

        //var_dump($request->all());

        $params = '';
        /* if ($_POST['params'] != '') {
            $_SESSION['mod_documentos']['listado_documentos_financieros']['filters'] = $_POST['params'];
            $params = json_decode($_POST['params']);
        } */

        $rsModulos = Modulo::getModulos();

        $rsModulos = Modulo::where('mod_estado', '=', Modulo::ESTADO_ACTIVO)
            ->where('mod_eliminado', '=', Define::NO_ELIMINADO)
            ->select('mod_codigo as codigo', 'mod_nombre as nombre', 'mod_estado as estado', 'mod_url as url')
            ->get();


        $response = array('data' => $rsModulos, 'count' => 2);

        echo $callback . '(' . json_encode($response) . ')';
        return;


        return $rsModulos;
    }
}
