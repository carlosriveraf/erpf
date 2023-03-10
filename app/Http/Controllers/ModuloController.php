<?php

namespace App\Http\Controllers;

use App\Models\Define;
use App\Models\Modulo;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModuloController extends Controller
{
    public function index(): View
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

    public function listadoModulos(Request $request): string
    {
        $callback = $request->input('callback');

        $params = '';
        if ($request->post('params') != '') {
            session()->put('mod_modulos.listado_modulos.filters', $request->post('params'));
            $params = json_decode($request->post('params'))[0];
        }

        $rsModulos = Modulo::getModulos($params);

        $listadoModulos = [];
        foreach ($rsModulos['result'] as $item) {
            $tpl_estado = '';
            if ($item->mod_estado == Modulo::ESTADO_INACTIVO) {
                $tpl_estado = Modulo::FORMATO_ESTADO_INACTIVO;
            } elseif ($item->mod_estado == Modulo::ESTADO_ACTIVO) {
                $tpl_estado = Modulo::FORMATO_ESTADO_ACTIVO;
            }

            $listadoModulos[] = [
                'tool' => view('sistema.modulos.tools', ['item' => $item])->render(),
                'id' => $item->mod_id,
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

    public function jsonEstados(): array
    {
        $jsonEstado[] = ['id' => Modulo::ESTADO_INACTIVO, 'name' => Modulo::FORMATO_ESTADO_INACTIVO];
        $jsonEstado[] = ['id' => Modulo::ESTADO_ACTIVO, 'name' => Modulo::FORMATO_ESTADO_ACTIVO];

        return $jsonEstado;
    }

    public function store(Request $request): string
    {
        $error = [];
        if (null === $request->post('CM_nombre') || $request->post('CM_nombre') === '') {
            $error['CM_nombre'] = '* Ingre el nombre';
        }
        if (null === $request->post('CM_url') || $request->post('CM_url') === '') {
            $error['CM_url'] = '* Ingre la url';
        }
        if (null === $request->post('CM_esprincipal') || !in_array($request->post('CM_esprincipal'), [0, 1])) {
            $error['CM_esprincipal'] = '* Indicar si es m??dulo principal o no.';
        }
        if ($request->post('CM_esprincipal') == 0) {
            if (null === $request->post('CM_modulopadre')) {
                $error['CM_modulopadre'] = '* Indicar el m??dulo padre.';
            } else {
                if (!Modulo::existsModuloByCodigo($request->post('CM_modulopadre'))) {
                    $error['CM_modulopadre'] = '* M??dulo no existe.';
                }
                if (!Modulo::esActivoModuloByCodigo($request->post('CM_modulopadre'))) {
                    $error['CM_modulopadre'] = '* M??dulo no activo.';
                }
                if (Modulo::esEliminadoModuloByCodigo($request->post('CM_modulopadre'))) {
                    $error['CM_modulopadre'] = '* M??dulo eliminado.';
                }
            }
        }

        if (count($error) > 0) {
            return json_encode(['status' => Define::STATUS_ERROR, 'error' => $error]);
        }

        $mod_nombre = (string) $request->post('CM_nombre');
        $mod_url = (string) $request->post('CM_url');
        $mod_descripcion = (string) $request->post('CM_descripcion');
        $mod_modulopadre = (string) $request->post('CM_modulopadre');

        if ($request->post('CM_modulopadre') == '') {
            $mod_modulopadre = null;
        } else {
            $mod_modulopadre = Modulo::firstWhere('mod_codigo', '=', $request->post('CM_modulopadre'))->mod_id;
        }

        Modulo::crearModulo([
            'mod_nombre' => $mod_nombre,
            'mod_url' => $mod_url,
            'mod_descripcion' => $mod_descripcion,
            'mod_codigo' => str_pad(Modulo::getLastIdModulo() + 1, 5, '0', STR_PAD_LEFT),
            'mod_padre_id' => $mod_modulopadre,
            'mod_usu_id_registro' => Auth::id(),
            'mod_usu_id_modificado' => Auth::id(),
            'mod_ip_registro' => $request->ip(),
            'mod_ip_modificado' => $request->ip(),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return json_encode(['status' => Define::STATUS_OK, 'message' => 'M??dulo creado con ??xito']);
    }

    public function cambiarEstado(Request $request): string
    {
        $error = [];
        if (null === $request->post('codigo') || $request->post('codigo') === '') {
            $error['codigo'] = '* Indique el c??digo.';
        }
        if (null === $request->post('estado') || $request->post('estado') === '') {
            $error['estado'] = '* Indique el estado.';
        }
        if (!in_array($request->post('estado'), [Modulo::ESTADO_ACTIVO, Modulo::ESTADO_INACTIVO])) {
            $error['estado'] = '* Estado no v??lido.';
        }
        if (!Modulo::existsModuloByCodigo($request->post('codigo'))) {
            $error['codigo'] = '* M??dulo no existe.';
        }

        if (count($error) > 0) {
            return json_encode(['status' => Define::STATUS_ERROR, 'error' => $error]);
        }

        $update = Modulo::actualizarModuloByCodigo($request->post('codigo'), [
            'mod_estado' => $request->post('estado'),
            'mod_usu_id_modificado' => Auth::id(),
            'mod_ip_modificado' => $request->ip(),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        if (!$update) {
            $error['codigo'] = '* Error al actualizar el estado.';
            return json_encode(['status' => Define::STATUS_ERROR, 'error' => $error]);
        }

        return json_encode(['status' => Define::STATUS_OK, 'message' => 'Actualizaci??n exitosa.']);
    }

    public function eliminar(Request $request): string
    {
        $error = [];
        if (null === $request->post('codigo') || $request->post('codigo') === '') {
            $error['codigo'] = '* Indique el c??digo.';
        }
        if (!Modulo::existsModuloByCodigo($request->post('codigo'))) {
            $error['codigo'] = '* M??dulo no existe.';
        }

        if (count($error) > 0) {
            return json_encode(['status' => Define::STATUS_ERROR, 'error' => $error]);
        }

        $eliminar = Modulo::actualizarModuloByCodigo($request->post('codigo'), [
            'mod_eliminado' => Define::ELIMINADO,
            'mod_usu_id_modificado' => Auth::id(),
            'mod_ip_modificado' => $request->ip(),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        if (!$eliminar) {
            $error['codigo'] = '* Error al eliminar el m??dulo.';
            return json_encode(['status' => Define::STATUS_ERROR, 'error' => $error]);
        }

        return json_encode(['status' => Define::STATUS_OK, 'message' => 'Eliminaci??n exitosa.']);
    }
}
