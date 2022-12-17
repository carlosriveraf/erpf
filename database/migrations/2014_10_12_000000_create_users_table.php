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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nombres', 100);
            $table->string('apellido_paterno', 100);
            $table->string('apellido_materno', 100);
            $table->unsignedBigInteger('tdi_id');
            $table->string('tdi_numero', 20);
            $table->string('usuario', 100)->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->unsignedTinyInteger('eliminado')->default(Define::NO_ELIMINADO);
            $table->unsignedTinyInteger('estado')->default(User::ESTADO_INACTIVO);
            $table->timestamps();

            $table->unique(['tdi_id', 'tdi_numero']);
            $table->foreign('tdi_id')->references('tdi_id')->on(TipoDocumentoIdentidad::TABLE);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
