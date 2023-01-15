<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use App\Models\TipoDocumentoIdentidad;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class UsuarioController extends Controller
{
    public function index(): View
    {
        $strParams = session()->get('mod_usuarios.listado_usuarios.filters');

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

        return view('sistema.usuarios.index', [
            'params' => $params,
        ]);
    }

    public function listadoUsuarios(Request $request): string
    {
        $callback = $request->input('callback');

        $params = '';
        if ($request->post('params') != '') {
            session()->put('mod_usuarios.listado_usuarios.filters', $request->post('params'));
            $params = json_decode($request->post('params'))[0];
        }

        $rsUsuarios = User::getUsuarios($params);

        $listadoUsuarios = [];
        foreach ($rsUsuarios['result'] as $item) {
            $tpl_estado = '';
            if ($item->usu_estado == User::ESTADO_INACTIVO) {
                $tpl_estado = User::FORMATO_ESTADO_INACTIVO;
            } elseif ($item->usu_estado == User::ESTADO_ACTIVO) {
                $tpl_estado = User::FORMATO_ESTADO_ACTIVO;
            }

            $listadoUsuarios[] = [
                'tool' => '',
                'id' => $item->usu_id,
                'usuario' => $item->usu_usuario,
                'nombres' => $item->usu_nombres,
                'apellido_paterno' => $item->usu_apellido_paterno,
                'apellido_materno' => $item->usu_apellido_materno,
                'tipodocumento' => $item->tdi_codigo,
                'tpl_tipodocumento' => $item->tdi_descripcion,
                'nrodocumento' => $item->usu_tdi_numero,
                'correo' => $item->usu_email,
                'estado' => $item->usu_estado,
                'tpl_estado' => $tpl_estado,
                'ip_registro' => $item->usu_ip_registro,
                'ip_modificado' => $item->usu_ip_modificado,
                'usuario_registro' => $item->usuario_registro,
                'usuario_modificado' => $item->usuario_modificado,
                'fecha_registro' => $item->created_at,
                'fecha_modificado' => $item->updated_at,
            ];
        }

        $response = array('data' => $listadoUsuarios, 'count' => $rsUsuarios['total']);

        return $callback . '(' . json_encode($response) . ')';
    }

    public function jsonEstados(): array
    {
        $jsonEstado[] = ['id' => User::ESTADO_INACTIVO, 'name' => User::FORMATO_ESTADO_INACTIVO];
        $jsonEstado[] = ['id' => User::ESTADO_ACTIVO, 'name' => User::FORMATO_ESTADO_ACTIVO];

        return $jsonEstado;
    }

    public function jsonTipoDocumento(): array
    {
        $jsonTipoDocumento = [];

        $tdi = TipoDocumentoIdentidad::getTipoDocumentoIdentidad();
        foreach ($tdi['result'] as $value) {
            $jsonTipoDocumento[] = ['id' => $value->tdi_codigo, 'name' => $value->tdi_descripcion];
        }

        return $jsonTipoDocumento;
    }
}
