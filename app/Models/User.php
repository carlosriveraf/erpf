<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    const TABLE = 'users';

    const FORMATO_ESTADO_INACTIVO = 'INACTIVO';
    const ESTADO_INACTIVO = 0;
    const FORMATO_ESTADO_ACTIVO = 'ACTIVO';
    const ESTADO_ACTIVO = 1;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'usu_password',
        'usu_remember_token',
        'usu_two_factor_recovery_codes',
        'usu_two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'usu_email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'usu_profile_photo_url',
    ];

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
    protected $primaryKey = 'usu_id';

    public static function getUsuarios(string|Object $params = ''): array
    {
        $listaCampos = [
            'usuario' => 'US.usu_usuario',
            'nombres' => 'US.usu_nombres',
            'apellido_paterno' => 'US.usu_apellido_paterno',
            'apellido_materno' => 'US.usu_apellido_materno',
            'tipodocumento' => 'TDI.tdi_codigo',
            'nrodocumento' => 'US.usu_tdi_numero',
            'correo' => 'US.usu_email',
            'estado' => 'US.usu_estado',
            'ip_registro' => 'US.usu_ip_registro',
            'ip_modificado' => 'US.usu_ip_modificado',
            'fecha_registro' => 'US.created_at',
            'fecha_modificado' => 'US.updated_at',
            'usuario_registro' => DB::raw("CONCAT(USR.usu_nombres,' ',USR.usu_apellido_paterno,' ',USR.usu_apellido_materno)"),
            'usuario_modificado' => DB::raw("CONCAT(USM.usu_nombres,' ',USM.usu_apellido_paterno,' ',USM.usu_apellido_materno)"),
        ];

        $sql = DB::table(self::TABLE, 'US')
            ->select(
                'US.usu_id',
                'US.usu_nombres',
                'US.usu_apellido_paterno',
                'US.usu_apellido_materno',
                'US.usu_tdi_numero',
                'US.usu_usuario',
                'US.usu_email',
                'US.usu_estado',
                'US.usu_ip_registro',
                'US.usu_ip_modificado',
                'US.created_at',
                'US.updated_at',
                DB::raw("CONCAT(USR.usu_nombres,' ',USR.usu_apellido_paterno,' ',USR.usu_apellido_materno) AS usuario_registro"),
                DB::raw("CONCAT(USM.usu_nombres,' ',USM.usu_apellido_paterno,' ',USM.usu_apellido_materno) AS usuario_modificado"),
                'TDI.tdi_codigo',
                'TDI.tdi_descripcion'
            )
            ->join(User::TABLE . ' AS USR', 'US.usu_usu_id_registro', '=', 'USR.usu_id')
            ->join(User::TABLE . ' AS USM', 'US.usu_usu_id_modificado', '=', 'USM.usu_id')
            ->join(TipoDocumentoIdentidad::TABLE . ' AS TDI', 'US.usu_tdi_id', '=', 'TDI.tdi_id')
            ->where('US.usu_eliminado', '=', Define::NO_ELIMINADO);

        $data = Define::filter($listaCampos, $sql, $params, 'usu_id', 'desc');

        return ['result' => $data['records'], 'total' => $data['total']];
    }
}
