<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Define extends Model
{

    const FORMATO_ESTADO_ELIMINADO = 'ELIMINADO';
    const FORMATO_ESTADO_NO_ELIMINADO = 'NO ELIMINADO';

    const ELIMINADO = 1;
    const NO_ELIMINADO = 0;

    const STATUS_ERROR = 0;
    const STATUS_OK = 1;
}
