<?php

use App\Models\Define;
use App\Models\TipoDocumentoIdentidad;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(TipoDocumentoIdentidad::TABLE, function (Blueprint $table) {
            $table->id('tdi_id');
            $table->string('tdi_codigo', 1)->unique();
            $table->string('tdi_descripcion', 100);
            $table->unsignedTinyInteger('tdi_eliminado')->default(Define::NO_ELIMINADO);
            $table->unsignedTinyInteger('tdi_estado')->default(TipoDocumentoIdentidad::ESTADO_INACTIVO);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(TipoDocumentoIdentidad::TABLE);
    }
};
