<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Laravel\Fortify\Fortify;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(User::TABLE, function (Blueprint $table) {
            $table->text('usu_two_factor_secret')
                    ->after('usu_password')
                    ->nullable();

            $table->text('usu_two_factor_recovery_codes')
                    ->after('usu_two_factor_secret')
                    ->nullable();

            if (Fortify::confirmsTwoFactorAuthentication()) {
                $table->timestamp('usu_two_factor_confirmed_at')
                        ->after('usu_two_factor_recovery_codes')
                        ->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(User::TABLE, function (Blueprint $table) {
            $table->dropColumn(array_merge([
                'usu_two_factor_secret',
                'usu_two_factor_recovery_codes',
            ], Fortify::confirmsTwoFactorAuthentication() ? [
                'usu_two_factor_confirmed_at',
            ] : []));
        });
    }
};
