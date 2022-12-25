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
            'nombre' => 'MO.mod_nombre',
            'url' => 'MO.mod_url',
            'descripcion' => 'MO.mod_descripcion',
            'codigo' => 'MO.mod_codigo',
            'estado' => 'MO.mod_estado',
            'fecha_registro' => 'MO.created_at',
            'fecha_modificado' => 'MO.updated_at',
        ];

        $fechas = [
            'fecha_registro',
            'fecha_modificado',
        ];

        /* $listaOperadores = [
            'eq' => '=',
            'neq' => '!=',
            'isnull' => '=',
            'isnotnull' => '!=',
            'lt' => '<',
            'lte' => '<=',
            'gt' => '>',
            'gte' => '>=',
            'startswith' => ['expr' => '%s LIKE :%s', 'val' => '%s%%'],
            'doesnotstartwith' => ['expr' => '%s LIKE :%s', 'val' => '%s%%'],
            'endswith' => ['expr' => '%s LIKE :%s', 'val' => '%%%s'],
            'doesnotendwith' => ['expr' => '%s LIKE :%s', 'val' => '%%%s'],
            'contains' => ['expr' => '%s LIKE :%s', 'val' => '%%%s%%'],
            'doesnotcontain' => ['expr' => '%s NOT LIKE :%s', 'val' => '%%%s%%'],
            'isempty' => '=',
            'isnotempty' => '!=',
        ]; */

        $listaOperadores = [
            'eq'                => ['expr' => '=', 'val' => '%s'],
            'neq'               => ['expr' => '!=', 'val' => '%s'],
            'isnull'            => ['expr' => '=', 'val' => null],
            'isnotnull'         => ['expr' => '!=', 'val' => null],
            'lt'                => ['expr' => '<', 'val' => '%s'],
            'lte'               => ['expr' => '<=', 'val' => '%s'],
            'gt'                => ['expr' => '>', 'val' => '%s'],
            'gte'               => ['expr' => '>=', 'val' => '%s'],
            'startswith'        => ['expr' => 'like', 'val' => '%s%%'],
            'endswith'          => ['expr' => 'like', 'val' => '%%%s'],
            'contains'          => ['expr' => 'like', 'val' => '%%%s%%'],
            'doesnotcontain'    => ['expr' => 'not like', 'val' => '%%%s%%'],
            'isempty'           => ['expr' => '=', 'val' => ''],
            'isnotempty'        => ['expr' => '!=', 'val' => '']
        ];

        $select = [];
        foreach ($listaCampos as $alias => $column) {
            $select[] = $column . ' AS ' . $alias;
        }

        /* $result = Modulo::where('mod_estado', '=', Modulo::ESTADO_ACTIVO)
            ->where('mod_eliminado', '=', Define::NO_ELIMINADO)
            ->select('mod_codigo as codigo', 'mod_nombre as nombre', 'mod_estado as estado', 'mod_url as url')
            ->get(); */

        $sql = DB::table(self::TABLE . ' AS MO')
            ->select($select)
            ->where('mod_estado', '=', Modulo::ESTADO_ACTIVO)
            ->where('mod_eliminado', '=', Define::NO_ELIMINADO);

        $orderColumn = 'mod_id';
        $orderSort = 'desc';

        /* echo '<pre>';
        var_dump($params);
        echo '</pre>'; */

        if ($params != '' && is_object($params)) {
            //filter
            //sort
            if (isset($params->filter) && is_object($params->filter)) {
                if (count($params->filter->filters) <= 2) {
                    foreach ($params->filter->filters as $key => $filter) {
                        /* var_dump('filter');
                        var_dump($filter);
                        var_dump(isset($filter->filters));
                        var_dump($filter->filters); */
                        //if (count($filter->filters) == 2) {
                        if (isset($filter->filters)) {
                            foreach ($filter->filters as $iKey => $iFilter) {
                            }
                        } else {

                            if (in_array($filter->field, $fechas)) {
                                if ($filter->value != '') {
                                    $value = (new DateTime($filter->value))->format('Y-m-d');
                                } else {
                                    $value = '';
                                }
                            }

                            var_dump($value);

                            //var_dump($filter->field);
                            /* var_dump($listaOperadores[$filter->operator]);
                            var_dump($listaOperadores[$filter->operator]['val']); */
                            if ($listaOperadores[$filter->operator]['val'] === null) {
                                $value = null;
                            } else {
                                /* var_dump($listaOperadores[$filter->operator]);
                                var_dump($filter->value); */
                                $value = sprintf($listaOperadores[$filter->operator]['val'], $filter->value);
                            }

                            /* var_dump($listaCampos[$filter->field]);
                            var_dump($listaOperadores[$filter->operator]['expr']);
                            var_dump($value);
                            return; */

                            $sql = $sql->where($listaCampos[$filter->field], $listaOperadores[$filter->operator]['expr'], $value);
                            //var_dump($filter);
                        }
                    }
                } else {
                }
            }

            /* if (is_object($params[0]->filter)) {
                if (count($params[0]->filter->filters) <= 2) {
                    $where = [];
                    $valWhere = [];

                    foreach ($params[0]->filter->filters as $key => $filter) {
                        if (count($filter->filters) == 2) {
                            $iWhere = [];
                            $iValWhere = [];

                            foreach ($filter->filters as $iKey => $iFilter) {
                                if ($iFilter->field == 'f_registro') // Excepción para campo del tipo fecha
                                {
                                    if ($iFilter->value != '') {
                                        $fechaFiltro = new DateTime($iFilter->value);
                                        $iValFilter = $fechaFiltro->format('Y-m-d');
                                    } else {
                                        $iValFilter = $iFilter->value;
                                    }
                                } else {
                                    $iValFilter = $iFilter->value;
                                }

                                $iWhere[] = sprintf($listaOperadores[$iFilter->operator]['expr'], $listaCampos[$iFilter->field], $iFilter->field . $iKey);
                                $iValWhere[$iFilter->field . $iKey] = sprintf($listaOperadores[$iFilter->operator]['val'], $iValFilter);
                            }

                            $iExpWhere = implode(' ' . $filter->logic . ' ', $iWhere);

                            $sql->where($iExpWhere, $iValWhere, TRUE);
                        } else {
                            if ($filter->field == 'f_registro') // Excepción para campo del tipo fecha
                            {
                                if ($filter->value != '') {
                                    $fechaFiltro = new DateTime($filter->value);
                                    $valFilter = $fechaFiltro->format('Y-m-d');
                                } else {
                                    $valFilter = $filter->value;
                                }
                            } else {
                                $valFilter = $filter->value;
                            }

                            $where[] = sprintf($listaOperadores[$filter->operator]['expr'], $listaCampos[$filter->field], $filter->field . $key);
                            $valWhere[$filter->field . $key] = sprintf($listaOperadores[$filter->operator]['val'], $valFilter);
                        }
                    }

                    $expWhere = implode(' ' . $params[0]->filter->logic . ' ', $where);
                    $sql->where($expWhere, $valWhere, TRUE);
                } else {
                    $where = [];
                    $valWhere = [];

                    foreach ($params[0]->filter->filters as $key => $filter) {
                        if (count($filter->filters) == 2) {
                            $iWhere = [];
                            $iValWhere = [];

                            foreach ($filter->filters as $iKey => $iFilter) {
                                if ($iFilter->field == 'f_registro') // Excepción para campo del tipo fecha
                                {
                                    if ($iFilter->value != '') {
                                        $fechaFiltro = new DateTime($iFilter->value);
                                        $iValFilter = $fechaFiltro->format('Y-m-d');
                                    } else {
                                        $iValFilter = $iFilter->value;
                                    }
                                } else {
                                    $iValFilter = $iFilter->value;
                                }

                                $iWhere[] = sprintf($listaOperadores[$iFilter->operator]['expr'], $listaCampos[$iFilter->field], $iFilter->field . $iKey);
                                $iValWhere[$iFilter->field . $iKey] = sprintf($listaOperadores[$iFilter->operator]['val'], $iValFilter);
                            }
                            $iExpWhere = implode(' ' . $filter->logic . ' ', $iWhere);
                            $sql->where($iExpWhere, $iValWhere, TRUE);
                        } else {
                            if ($filter->field == 'f_registro') // Excepción para campo del tipo fecha
                            {
                                if ($filter->value != '') {
                                    $fechaFiltro = new DateTime($filter->value);
                                    $valFilter = $fechaFiltro->format('Y-m-d');
                                } else {
                                    $valFilter = $filter->value;
                                }
                            } else {
                                $valFilter = $filter->value;
                            }

                            $where[] = sprintf($listaOperadores[$filter->operator]['expr'], $listaCampos[$filter->field], $filter->field . $key);
                            $valWhere[$filter->field . $key] = sprintf($listaOperadores[$filter->operator]['val'], $valFilter);
                        }
                    }

                    $expWhere = implode(' ' . $params[0]->filter->logic . ' ', $where);

                    $sql->where($expWhere, $valWhere, TRUE);
                }
            }

            if (is_array($params[0]->sort)) {
                $orders = [];

                foreach ($params[0]->sort as $sort) {
                    $orders[] = $listaCampos[$sort->field] . ' ' . $sort->dir;
                }

                if (count($orders) > 0) {
                    $sql->order(implode(', ', $orders));
                } else {
                    $sql->order($order);
                }
            } else {
                $sql->order($order);
            } */
        } else {
            $sql = $sql->orderBy($orderColumn, $orderSort);
        }

        $total = count($sql->get());

        $sql = $sql->skip($params->skip)->take($params->take);

        return ['result' => $sql->get(), 'total' => $total];
    }
}
