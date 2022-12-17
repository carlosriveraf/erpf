<?php

use App\Models\Define;
use App\Models\TipoDocumentoIdentidad;
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
        Schema::create(User::TABLE, function (Blueprint $table) {
            $table->id('usu_id');
            $table->string('usu_nombres', 100);
            $table->string('usu_apellido_paterno', 100);
            $table->string('usu_apellido_materno', 100);
            $table->unsignedBigInteger('usu_tdi_id');
            $table->string('usu_tdi_numero', 20);
            $table->string('usu_usuario', 100)->unique();
            $table->string('usu_email')->unique();
            $table->timestamp('usu_email_verified_at')->nullable();
            $table->string('usu_password');
            $table->rememberToken();
            $table->foreignId('usu_current_team_id')->nullable();
            $table->string('usu_profile_photo_path', 2048)->nullable();
            $table->unsignedTinyInteger('usu_eliminado')->default(Define::NO_ELIMINADO);
            $table->unsignedTinyInteger('usu_estado')->default(User::ESTADO_INACTIVO);
            $table->timestamps();

            $table->unique(['usu_tdi_id', 'usu_tdi_numero']);
            $table->foreign('usu_tdi_id')->references('tdi_id')->on(TipoDocumentoIdentidad::TABLE);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(User::TABLE);
    }
};
