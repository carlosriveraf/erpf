<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Modulo extends Model
{
    const TABLE = 'modulo';

    const FORMATO_ESTADO_INACTIVO = 'INACTIVO';
    const ESTADO_INACTIVO = 0;
    const FORMATO_ESTADO_ACTIVO = 'ACTIVO';
    const ESTADO_ACTIVO = 1;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = self::TABLE;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'mod_id';

    public function modulosHijos()
    {
        return $this->hasMany(Modulo::class, 'mod_padre_id', 'mod_id');
    }

    public static function getModulos(string|Object $params = '')
    {
        $listaCampos = [
            'codigo' => 'MO.mod_codigo',
            'nombre' => 'MO.mod_nombre',
            'url' => 'MO.mod_url',
            'descripcion' => 'MO.mod_descripcion',
            'estado' => 'MO.mod_estado',
            'ip_registro' => 'MO.mod_ip_registro',
            'ip_modificado' => 'MO.mod_ip_modificado',
            'fecha_registro' => 'MO.created_at',
            'fecha_modificado' => 'MO.updated_at',
            'usuario_registro' => DB::raw("CONCAT(USR.usu_nombres,' ',USR.usu_apellido_paterno,' ',USR.usu_apellido_materno)"),
            'usuario_modificado' => DB::raw("CONCAT(USM.usu_nombres,' ',USM.usu_apellido_paterno,' ',USM.usu_apellido_materno)"),
        ];

        $fechas = [
            'fecha_registro',
            'fecha_modificado',
        ];

        $listaOperadores = [
            'eq' => ['expr' => '=', 'val' => '%s'],
            'neq' => ['expr' => '!=', 'val' => '%s'],
            'isnull' => ['expr' => '=', 'val' => null],
            'isnotnull' => ['expr' => '!=', 'val' => null],
            'lt' => ['expr' => '<', 'val' => '%s'],
            'lte' => ['expr' => '<=', 'val' => '%s'],
            'gt' => ['expr' => '>', 'val' => '%s'],
            'gte' => ['expr' => '>=', 'val' => '%s'],
            'startswith' => ['expr' => 'like', 'val' => '%s%%'],
            'endswith' => ['expr' => 'like', 'val' => '%%%s'],
            'contains' => ['expr' => 'like', 'val' => '%%%s%%'],
            'doesnotcontain' => ['expr' => 'not like', 'val' => '%%%s%%'],
            'isempty' => ['expr' => '=', 'val' => ''],
            'isnotempty' => ['expr' => '!=', 'val' => '']
        ];

        $sql = DB::table(self::TABLE, 'MO')
            ->select(
                'MO.mod_codigo',
                'MO.mod_nombre',
                'MO.mod_url',
                'MO.mod_descripcion',
                'MO.mod_estado',
                'MO.mod_ip_registro',
                'MO.mod_ip_modificado',
                'MO.created_at',
                'MO.updated_at',
                DB::raw("CONCAT(USR.usu_nombres,' ',USR.usu_apellido_paterno,' ',USR.usu_apellido_materno) AS usuario_registro"),
                DB::raw("CONCAT(USM.usu_nombres,' ',USM.usu_apellido_paterno,' ',USM.usu_apellido_materno) AS usuario_modificado")
            )
            ->join(User::TABLE . ' AS USR', 'MO.mod_usu_id_registro', '=', 'USR.usu_id')
            ->join(User::TABLE . ' AS USM', 'MO.mod_usu_id_modificado', '=', 'USM.usu_id')
            ->where('mod_estado', '=', Modulo::ESTADO_ACTIVO)
            ->where('mod_eliminado', '=', Define::NO_ELIMINADO);

        $orderColumn = 'mod_id';
        $orderSort = 'desc';

        if ($params != '' && is_object($params)) {
            if (isset($params->filter) && is_object($params->filter)) {
                if ($params->filter->logic == 'or') {
                    $tmp = clone $params->filter;
                    $params->filter->logic = 'and';
                    unset($params->filter->filters);
                    $params->filter->filters[] = $tmp;
                }
                if (count($params->filter->filters) <= 2) {
                    foreach ($params->filter->filters as $key => $filter) {
                        if (isset($filter->filters)) {
                            $sql = $sql->where(function ($query) use ($filter, $fechas, $listaCampos, $listaOperadores) {
                                $counter = 1;
                                foreach ($filter->filters as $iKey => $iFilter) {
                                    if ($counter == 1) {
                                        $logic = 'and';
                                    } else {
                                        $logic = $filter->logic;
                                    }
                                    if (in_array($iFilter->field, $fechas)) {
                                        if ($iFilter->value != '') {
                                            $value = (new DateTime($iFilter->value))->format('Y-m-d');
                                        } else {
                                            $value = '';
                                        }
                                        $query = $query->whereDate($listaCampos[$iFilter->field], $listaOperadores[$iFilter->operator]['expr'], $value, $logic);
                                    } else {
                                        if ($listaOperadores[$iFilter->operator]['val'] === null) {
                                            $value = null;
                                        } else {
                                            $value = sprintf($listaOperadores[$iFilter->operator]['val'], $iFilter->value);
                                        }
                                        $query = $query->where($listaCampos[$iFilter->field], $listaOperadores[$iFilter->operator]['expr'], $value, $logic);
                                    }
                                    $counter++;
                                }
                            });
                        } else {
                            if (in_array($filter->field, $fechas)) {
                                if ($filter->value != '') {
                                    $value = (new DateTime($filter->value))->format('Y-m-d');
                                } else {
                                    $value = '';
                                }
                                $sql = $sql->whereDate($listaCampos[$filter->field], $listaOperadores[$filter->operator]['expr'], $value);
                            } else {
                                if ($listaOperadores[$filter->operator]['val'] === null) {
                                    $value = null;
                                } else {
                                    $value = sprintf($listaOperadores[$filter->operator]['val'], $filter->value);
                                }
                                $sql = $sql->where($listaCampos[$filter->field], $listaOperadores[$filter->operator]['expr'], $value);
                            }
                        }
                    }
                } else {
                    foreach ($params->filter->filters as $key => $filter) {
                        if (isset($filter->filters)) {
                            $sql = $sql->where(function ($query) use ($filter, $fechas, $listaCampos, $listaOperadores) {
                                $counter = 1;
                                foreach ($filter->filters as $iKey => $iFilter) {
                                    if ($counter == 1) {
                                        $logic = 'and';
                                    } else {
                                        $logic = $filter->logic;
                                    }
                                    if (in_array($iFilter->field, $fechas)) {
                                        if ($iFilter->value != '') {
                                            $value = (new DateTime($iFilter->value))->format('Y-m-d');
                                        } else {
                                            $value = '';
                                        }
                                        $query = $query->whereDate($listaCampos[$iFilter->field], $listaOperadores[$iFilter->operator]['expr'], $value, $logic);
                                    } else {
                                        if ($listaOperadores[$iFilter->operator]['val'] === null) {
                                            $value = null;
                                        } else {
                                            $value = sprintf($listaOperadores[$iFilter->operator]['val'], $iFilter->value);
                                        }
                                        $query = $query->where($listaCampos[$iFilter->field], $listaOperadores[$iFilter->operator]['expr'], $value, $logic);
                                    }
                                    $counter++;
                                }
                            });
                        } else {
                            if (in_array($filter->field, $fechas)) {
                                if ($filter->value != '') {
                                    $value = (new DateTime($filter->value))->format('Y-m-d');
                                } else {
                                    $value = '';
                                }
                                $sql = $sql->whereDate($listaCampos[$filter->field], $listaOperadores[$filter->operator]['expr'], $value);
                            } else {
                                if ($listaOperadores[$filter->operator]['val'] === null) {
                                    $value = null;
                                } else {
                                    $value = sprintf($listaOperadores[$filter->operator]['val'], $filter->value);
                                }
                                $sql = $sql->where($listaCampos[$filter->field], $listaOperadores[$filter->operator]['expr'], $value);
                            }
                        }
                    }
                }
            }

            if (isset($params->sort) && is_array($params->sort)) {
                foreach ($params->sort as $key => $sort) {
                    $sql = $sql->orderBy($listaCampos[$sort->field], $sort->dir);
                }
            } else {
                $sql = $sql->orderBy($orderColumn, $orderSort);
            }
        } else {
            $sql = $sql->orderBy($orderColumn, $orderSort);
        }

        $total = count($sql->get());

        $sql = $sql->skip($params->skip)->take($params->take);

        return ['result' => $sql->get(), 'total' => $total];
    }
}
