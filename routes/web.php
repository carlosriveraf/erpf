<?php

use App\Http\Controllers\ModuloController;
use App\Http\Controllers\SandboxController;
use App\Http\Controllers\Sistema\UsuarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/sandbox', [SandboxController::class, 'index']);

    /* Módulos */
    Route::get('/sistema/modulos', [ModuloController::class, 'index'])->name('sistema.modulos');
    Route::post('/sistema/modulos/listado-modulos', [ModuloController::class, 'listadoModulos'])->name('sistema.modulos.listado_modulos');
    Route::post('/sistema/modulos/listado-modulos/json-estados', [ModuloController::class, 'jsonEstados'])->name('sistema.modulos.listado_modulos.json_estados');
    Route::post('/sistema/modulos', [ModuloController::class, 'store'])->name('sistema.modulos.store');
    Route::post('/sistema/modulos/cambiar-estado', [ModuloController::class, 'cambiarEstado'])->name('sistema.modulos.cambiar_estado');
    Route::post('/sistema/modulos/eliminar', [ModuloController::class, 'eliminar'])->name('sistema.modulos.eliminar');

    /* Usuarios */
    Route::get('/sistema/usuarios', [UsuarioController::class, 'index'])->name('sistema.usuarios');
    Route::post('/sistema/usuarios/listado-usuarios', [UsuarioController::class, 'listadoUsuarios'])->name('sistema.usuarios.listado_usuarios');
    Route::post('/sistema/usuarios/listado-usuarios/json-estado', [UsuarioController::class, 'jsonEstados'])->name('sistema.usuarios.listado_usuarios.json_estado');
    Route::post('/sistema/usuarios/listado-usuarios/json-tipo-documento', [UsuarioController::class, 'jsonTipoDocumento'])->name('sistema.usuarios.listado_usuarios.json_tipo_documento');
});
