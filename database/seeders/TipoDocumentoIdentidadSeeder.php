<?php

namespace Database\Seeders;

use App\Models\TipoDocumentoIdentidad;
use Illuminate\Database\Seeder;

class TipoDocumentoIdentidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoDocumentoIdentidad::create(['tdi_codigo' => 0, 'tdi_descripcion' => 'DOC.TRIB.NO.DOM.SIN.RUC', 'tdi_estado' => TipoDocumentoIdentidad::ESTADO_ACTIVO,]);
        TipoDocumentoIdentidad::create(['tdi_codigo' => 1, 'tdi_descripcion' => 'Documento Nacional de Identidad', 'tdi_estado' => TipoDocumentoIdentidad::ESTADO_ACTIVO,]);
        TipoDocumentoIdentidad::create(['tdi_codigo' => 4, 'tdi_descripcion' => 'Carnet de extranjería', 'tdi_estado' => TipoDocumentoIdentidad::ESTADO_ACTIVO,]);
        TipoDocumentoIdentidad::create(['tdi_codigo' => 6, 'tdi_descripcion' => 'Registro Unico de Contributentes', 'tdi_estado' => TipoDocumentoIdentidad::ESTADO_ACTIVO,]);
        TipoDocumentoIdentidad::create(['tdi_codigo' => 7, 'tdi_descripcion' => 'Pasaporte', 'tdi_estado' => TipoDocumentoIdentidad::ESTADO_ACTIVO,]);
        TipoDocumentoIdentidad::create(['tdi_codigo' => 'A', 'tdi_descripcion' => 'Cédula Diplomática de identidad', 'tdi_estado' => TipoDocumentoIdentidad::ESTADO_ACTIVO,]);
        TipoDocumentoIdentidad::create(['tdi_codigo' => 'B', 'tdi_descripcion' => 'DOC.IDENT.PAIS.RESIDENCIA-NO.D', 'tdi_estado' => TipoDocumentoIdentidad::ESTADO_ACTIVO,]);
        TipoDocumentoIdentidad::create(['tdi_codigo' => 'C', 'tdi_descripcion' => 'Tax Identi?cation Number - TIN - Doc Trib PP.NN', 'tdi_estado' => TipoDocumentoIdentidad::ESTADO_ACTIVO,]);
        TipoDocumentoIdentidad::create(['tdi_codigo' => 'D', 'tdi_descripcion' => 'Identi?cation Number - IN - Doc Trib PP. JJ', 'tdi_estado' => TipoDocumentoIdentidad::ESTADO_ACTIVO,]);
        TipoDocumentoIdentidad::create(['tdi_codigo' => 'E', 'tdi_descripcion' => 'TAM- Tarjeta Andina de Migración', 'tdi_estado' => TipoDocumentoIdentidad::ESTADO_ACTIVO,]);
    }
}
