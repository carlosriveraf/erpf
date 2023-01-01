<?php

namespace App\Http\Controllers;

use App\Models\Define;
use App\Models\Modulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ModuloController extends Controller
{
    public function index()
    {
        $strParams = session()->get('mod_modulos.listado_modulos.filters');

        $params['page'] = '';
        $params['sort'] = '';
        $params['filter'] = '';

        if ($strParams != '') {
            $objParams = json_decode($strParams);
            if (is_object($objParams[0])) {
                if (isset($objParams[0]->page) && $objParams[0]->page != '') {
                    $params['page'] = $objParams[0]->page;
                }
                if (isset($objParams[0]->sort) && $objParams[0]->sort != '') {
                    $params['sort'] = json_encode($objParams[0]->sort);
                }
                if (isset($objParams[0]->filter) && $objParams[0]->filter != '') {
                    $params['filter'] = json_encode($objParams[0]->filter);
                }
            }
        }

        return view('sistema.modulos.index', [
            'params' => $params,
        ]);
    }

    /* public function create()
    {
        return view('sistema.modulos.create');
    } */

    public function listadoModulos(Request $request)
    {
        $callback = $request->input('callback');

        $params = '';
        if ($request->post('params') != '') {
            session()->put('mod_modulos.listado_modulos.filters', $request->post('params'));
            $params = json_decode($request->post('params'))[0];
        }

        $rsModulos = Modulo::getModulos($params);

        $listadoModulos = [];
        foreach ($rsModulos['result'] as $key => $item) {
            $tpl_estado = '';
            if ($item->mod_estado == Modulo::ESTADO_INACTIVO) {
                $tpl_estado = Modulo::FORMATO_ESTADO_INACTIVO;
            } elseif ($item->mod_estado == Modulo::ESTADO_ACTIVO) {
                $tpl_estado = Modulo::FORMATO_ESTADO_ACTIVO;
            }

            $listadoModulos[] = [
                'codigo' => $item->mod_codigo,
                'nombre' => $item->mod_nombre,
                'url' => $item->mod_url,
                'descripcion' => $item->mod_descripcion,
                'estado' => $item->mod_estado,
                'tpl_estado' => $tpl_estado,
                'ip_registro' => $item->mod_ip_registro,
                'ip_modificado' => $item->mod_ip_modificado,
                'usuario_registro' => $item->usuario_registro,
                'usuario_modificado' => $item->usuario_modificado,
                'fecha_registro' => $item->created_at,
                'fecha_modificado' => $item->updated_at,
            ];
        }

        $response = array('data' => $listadoModulos, 'count' => $rsModulos['total']);

        return $callback . '(' . json_encode($response) . ')';
    }

    public function jsonEstados()
    {
        $jsonEstado[] = ['id' => Modulo::ESTADO_INACTIVO, 'name' => Modulo::FORMATO_ESTADO_INACTIVO];
        $jsonEstado[] = ['id' => Modulo::ESTADO_ACTIVO, 'name' => Modulo::FORMATO_ESTADO_ACTIVO];

        return $jsonEstado;
    }
}
