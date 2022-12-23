<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public static function getModulos()
    {
        //listacampos

        //listaoperadores

        //hacer el select

        //filtrar

        //contar

        //retornar cantidad y filas
        return 2;
    }
}
