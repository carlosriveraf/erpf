<?php

namespace App\Models;

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

    public static function getModulos($params = '')
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

        echo '<pre>';
        var_dump($params);
        echo '</pre>';

        if ($params != '' && is_array($params)) {
            //filter
            //sort
        } else {
            $sql = $sql->orderBy($orderColumn, $orderSort);
        }

        $total = count($sql->get());

        $sql = $sql->skip($params['skip'])->take($params['take']);

        return ['result' => $sql->get(), 'total' => $total];
    }
}
