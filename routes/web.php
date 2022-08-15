<?php

use App\Http\Controllers\ColaboradorController;
use App\Http\Controllers\ConsolidadoController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\ContractItemController;
use App\Http\Controllers\ContractProfileController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\EmployeeRoleController;
use App\Http\Controllers\EquipamentoController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\FuncaoController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\PerfilController;
use App\Models\ContractItem;
use App\Models\EquipamentModel;
use App\Models\Equipment;
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
    Route::get('equipamentos', function () {
        return Inertia::render('Equipamento');
    })->name('equipamento');
    Route::get('contratos', function () {
        return Inertia::render('Contrato');
    })->name('contrato');
    Route::get('perfis', function () {
        return Inertia::render('Perfil');
    })->name('perfil');
    Route::get('modelos', function () {
        return Inertia::render('ModeloEquipamento');
    })->name('modelo');
    Route::get('funcoes', function () {
        return Inertia::render('Funcao');
    })->name('funcao');
    Route::get('colaboradores', function () {
        return Inertia::render('Colaborador');
    })->name('colaborador');
    Route::get('consolidados', function () {
        return Inertia::render('Consolidado');
    })->name('consolidado');
    Route::get('frota', function () {
        return Inertia::render('Frota');
    })->name('frota');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])
->prefix("api")
->group(function () {

    Route::controller(EquipmentController::class)->group(function () {
        Route::get('equipamentos/full', 'index_full');
        Route::get('equipamentos/full/{equipamento}', 'show_full');
        Route::get('equipamentos/select', 'front_select');


        Route::get('equipamentos/', 'index');
        Route::get('equipamentos/{equipamento}', 'show');
        Route::post('equipamentos/', 'store');
        Route::put('equipamentos/{equipamento}', 'update');
        Route::delete('equipamentos/{equipamento}', 'destroy');
    });

    Route::controller(EquipamentModel::class)->group(function () {
        Route::get('modelos/select', 'front_select');
        Route::get('modelos/', 'index');
        Route::get('modelos/{modelo}', 'show');
        Route::post('modelos/', 'store');
        Route::put('modelos/{modelo}', 'update');
        Route::delete('modelos/{modelo}', 'destroy');
    });

    Route::controller(ContractController::class)->group(function () {
        Route::get('contratos/full', 'index_full');
        Route::get('contratos/full/{contrato}', 'show_full');
        Route::get('contratos/select', 'front_select');


        Route::get('contratos/', 'index');
        Route::get('contratos/{contrato}', 'show');
        Route::post('contratos/', 'store');
        Route::put('contratos/{contrato}', 'update');
        Route::delete('contratos/{contrato}', 'destroy');
    });

    Route::controller(ContractProfileController::class)->group(function () {
        Route::get('perfis/', 'index');
        Route::get('perfis/select', 'front_select');
        Route::get('perfis/{perfil}', 'show');
        Route::post('perfis/', 'store');
        Route::put('perfis/{perfil}', 'update');
        Route::delete('perfis/{perfil}', 'destroy');
    });

    Route::controller(EmployeeRoleController::class)->group(function () {
        Route::get('funcoes/', 'index');
        Route::get('funcoes/select', 'front_select');
        Route::get('funcoes/{funcao}', 'show');
        Route::post('funcoes/', 'store');
        Route::put('funcoes/{funcao}', 'update');
        Route::delete('funcoes/{funcao}', 'destroy');
    });

    Route::controller(ColaboradorController::class)->group(function () {
        Route::get('colaboradores/full', 'index_full');
        Route::get('colaboradores/full/{colaborador}', 'show_full');
        Route::get('colaboradores/select', 'front_select');


        Route::get('colaboradores/', 'index');
        Route::get('colaboradores/{colaborador}', 'show');
        Route::post('colaboradores/', 'store');
        Route::put('colaboradores/{colaborador}', 'update');
        Route::delete('colaboradores/{colaborador}', 'destroy');
    });

    Route::controller(ContractItemController::class)->group(function () {
        Route::get('consolidados/full', 'index_full');
        Route::get('consolidados/full/{consolidado}', 'show_full');
        Route::get('consolidados/select', 'front_select');

        Route::get('consolidados/', 'index');
        Route::get('consolidados/{consolidado}', 'show');
        Route::post('consolidados/', 'store');
        Route::put('consolidados/{consolidado}', 'update');
        Route::delete('consolidados/{consolidado}', 'destroy');
    });

});
