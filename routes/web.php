<?php

use App\Http\Controllers\ModuloController;
use App\Http\Controllers\SandboxController;
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

    Route::get('/sistema/modulos', [ModuloController::class, 'index'])->name('sistema.modulos');
    Route::post('/sistema/modulos/listado-modulos', [ModuloController::class, 'listadoModulos'])->name('sistema.modulos.listado_modulos');
    Route::post('/sistema/modulos/listado-modulos/json-estados', [ModuloController::class, 'jsonEstados'])->name('sistema.modulos.listado_modulos.json_estados');
    Route::post('/sistema/modulos', [ModuloController::class, 'store'])->name('sistema.modulos.store');
    //Route::get('/sistema/modulos/crear', [ModuloController::class, 'create'])->name('sistema.modulos.create');
});
