<?php

use App\Models\Define;
use App\Models\Modulo;
use App\Models\User;
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
        Schema::create('modulo', function (Blueprint $table) {
            $table->id('mod_id');
            $table->string('mod_nombre', 100);
            $table->string('mod_url');
            $table->text('mod_descripcion')->nullable();
            $table->string('mod_codigo', 5)->unique();
            $table->unsignedBigInteger('mod_padre_id')->nullable();
            $table->unsignedTinyInteger('mod_estado')->default(Modulo::ESTADO_INACTIVO);
            $table->unsignedTinyInteger('mod_eliminado')->default(Define::NO_ELIMINADO);
            $table->unsignedBigInteger('mod_usu_id_registro');
            $table->unsignedBigInteger('mod_usu_id_modificado');
            $table->ipAddress('mod_ip_registro');
            $table->ipAddress('mod_ip_modificado');
            $table->timestamps();

            $table->foreign('mod_padre_id')->references('mod_id')->on(Modulo::TABLE);
            $table->foreign('mod_usu_id_registro')->references('usu_id')->on(User::TABLE);
            $table->foreign('mod_usu_id_modificado')->references('usu_id')->on(User::TABLE);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modulo');
    }
};
