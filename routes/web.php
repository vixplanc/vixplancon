<?php

use App\Http\Controllers\ColaboradorController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\EquipamentoController;
use App\Http\Controllers\FuncaoController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\PerfilController;
use App\Models\Modelo;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    Route::get('/home', function () {
        return Inertia::render('Home');
    })->name('home');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])
->prefix("api")
->group(function () {

    Route::controller(EquipamentoController::class)->group(function () {
        Route::get('equipamento/', 'index');
        Route::get('equipamento/{equipamento}', 'show');
        Route::post('equipamento/', 'store');
        Route::put('equipamento/{equipamento}', 'update');
        Route::delete('equipamento/{equipamento}', 'destroy');
    });

    Route::controller(ModeloController::class)->group(function () {
        Route::get('modelo/', 'index');
        Route::get('modelo/{modelo}', 'show');
        Route::post('modelo/', 'store');
        Route::put('modelo/{modelo}', 'update');
        Route::delete('modelo/{modelo}', 'destroy');
    });

    Route::controller(ContratoController::class)->group(function () {
        Route::get('contrato/', 'index');
        Route::get('contrato/{contrato}', 'show');
        Route::post('contrato/', 'store');
        Route::put('contrato/{contrato}', 'update');
        Route::delete('contrato/{contrato}', 'destroy');
    });

    Route::controller(PerfilController::class)->group(function () {
        Route::get('perfil/', 'index');
        Route::get('perfil/{perfil}', 'show');
        Route::post('perfil/', 'store');
        Route::put('perfil/{perfil}', 'update');
        Route::delete('perfil/{perfil}', 'destroy');
    });

    Route::controller(FuncaoController::class)->group(function () {
        Route::get('funcao/', 'index');
        Route::get('funcao/{funcao}', 'show');
        Route::post('funcao/', 'store');
        Route::put('funcao/{funcao}', 'update');
        Route::delete('funcao/{funcao}', 'destroy');
    });

    Route::controller(ColaboradorController::class)->group(function () {
        Route::get('colaborador/', 'index');
        Route::get('colaborador/{colaboradorphp}', 'show');
        Route::post('colaborador/', 'store');
        Route::put('colaborador/{colaborador}', 'update');
        Route::delete('colaborador/{colaborador}', 'destroy');
    });

});
