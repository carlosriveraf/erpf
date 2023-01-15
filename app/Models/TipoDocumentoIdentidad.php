<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TipoDocumentoIdentidad extends Model
{
    const TABLE = 'tipo_documento_identidad';

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
    protected $primaryKey = 'tdi_id';

    public static function getTipoDocumentoIdentidad(string|Object $params = ''): array
    {
        $listaCampos = [];

        $sql = DB::table(self::TABLE, 'TDI')
            ->select(
                'TDI.tdi_id',
                'TDI.tdi_codigo',
                'TDI.tdi_descripcion'
            );


        $data = Define::filter($listaCampos, $sql, $params, 'tdi_descripcion', 'asc');

        return ['result' => $data['records'], 'total' => $data['total']];
    }
}
