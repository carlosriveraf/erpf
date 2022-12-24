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

        /* echo '<pre>';
        var_dump($request->post('params'));
        echo '</pre>'; */
        //return;
        $params = '';
        if ($request->post('params') != '') {
            //$_SESSION['mod_documentos']['listado_documentos_financieros']['filters'] = $_POST['params'];
            $params = (array) json_decode($request->post('params'))[0];
        }
        /* echo '<pre>';
        var_dump($params);
        echo '</pre>';
        return; */

        $rsModulos = Modulo::getModulos($params);

        /* $rsModulos = Modulo::where('mod_estado', '=', Modulo::ESTADO_ACTIVO)
            ->where('mod_eliminado', '=', Define::NO_ELIMINADO)
            ->select('mod_codigo as codigo', 'mod_nombre as nombre', 'mod_estado as estado', 'mod_url as url')
            ->get(); */


        $response = array('data' => $rsModulos['result'], 'count' => $rsModulos['total']);

        return $callback . '(' . json_encode($response) . ')';
    }
}
