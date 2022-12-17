<?php

use App\Models\Define;
use App\Models\Modulo;
use App\Models\User;
use App\Models\UsuarioModulo;
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
        Schema::create(UsuarioModulo::TABLE, function (Blueprint $table) {
            $table->id('um_id');
            $table->unsignedBigInteger('um_usu_id');
            $table->unsignedBigInteger('um_mod_id');
            $table->unsignedTinyInteger('um_estado')->default(UsuarioModulo::ESTADO_INACTIVO);
            $table->unsignedTinyInteger('um_eliminado')->default(Define::NO_ELIMINADO);
            $table->timestamps();

            $table->unique(['um_usu_id', 'um_mod_id']);

            $table->foreign('um_usu_id')->references('usu_id')->on(User::TABLE);
            $table->foreign('um_mod_id')->references('mod_id')->on(Modulo::TABLE);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(UsuarioModulo::TABLE);
    }
};
