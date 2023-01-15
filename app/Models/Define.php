<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class Define extends Model
{

    const FORMATO_ESTADO_ELIMINADO = 'ELIMINADO';
    const FORMATO_ESTADO_NO_ELIMINADO = 'NO ELIMINADO';

    const ELIMINADO = 1;
    const NO_ELIMINADO = 0;

    const STATUS_ERROR = 0;
    const STATUS_OK = 1;

    public static function filter(array $listaCampos, Builder $sql, string|Object $params = '', string $orderColumn, string $orderSort): array
    {
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

        if ($params != '' && is_object($params)) {
            $sql = $sql->skip($params->skip)->take($params->take);
        }

        return ['total' => $total, 'records' => $sql->get()];
    }
}
