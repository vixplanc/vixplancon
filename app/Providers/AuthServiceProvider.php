<?php

namespace App\Providers;

use App\Models\Consolidado;
use App\Models\Equipamento;
use App\Models\User;
use App\Policies\AutorizadoPolicy;
use App\Policies\ColaboradorPolicy;
use App\Policies\ConsolidadoPolicy;
use App\Policies\ContratoPolicy;
use App\Policies\EquipamentoPolicy;
use App\Policies\FuncaoPolicy;
use App\Policies\ModuloPolicy;
use App\Policies\PerfilPolicy;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // Consolidado::class => ConsolidadoPolicy::class,
        Equipamento::class => EquipamentoPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        // dd($this->policies());

        // Gate::define('index-consolidado', [ConsolidadoPolicy::class, 'viewAny']);
        // Gate::define('show-consolidado', [ConsolidadoPolicy::class, 'view']);
        // Gate::define('create-consolidado', [ConsolidadoPolicy::class, 'create']);
        // Gate::define('update-consolidado', [ConsolidadoPolicy::class, 'update']);
        // Gate::define('delete-consolidado', [ConsolidadoPolicy::class, 'delete']);


        // Gate::define('index', [EquipamentoPolicy::class, 'index']);
        // Gate::define('show-equipamento', [EquipamentoPolicy::class, 'view']);
        // Gate::define('create-equipamento', [EquipamentoPolicy::class, 'create']);
        // Gate::define('update-equipamento', [EquipamentoPolicy::class, 'update']);
        // Gate::define('delete-equipamento', [EquipamentoPolicy::class, 'delete']);


        // Gate::define('index-contrato', [ContratoPolicy::class, 'viewAny']);
        // Gate::define('show-contrato', [ContratoPolicy::class, 'view']);
        // Gate::define('create-contrato', [ContratoPolicy::class, 'create']);
        // Gate::define('update-contrato', [ContratoPolicy::class, 'update']);
        // Gate::define('delete-contrato', [ContratoPolicy::class, 'delete']);


        // Gate::define('index-funcao', [FuncaoPolicy::class, 'viewAny']);
        // Gate::define('show-funcao', [FuncaoPolicy::class, 'view']);
        // Gate::define('create-funcao', [FuncaoPolicy::class, 'create']);
        // Gate::define('update-funcao', [FuncaoPolicy::class, 'update']);
        // Gate::define('delete-funcao', [FuncaoPolicy::class, 'delete']);


        // Gate::define('index-colaborador', [ColaboradorPolicy::class, 'viewAny']);
        // Gate::define('show-colaborador', [ColaboradorPolicy::class, 'view']);
        // Gate::define('create-colaborador', [ColaboradorPolicy::class, 'create']);
        // Gate::define('update-colaborador', [ColaboradorPolicy::class, 'update']);
        // Gate::define('delete-colaborador', [ColaboradorPolicy::class, 'delete']);


        // Gate::define('index-perfil', [PerfilPolicy::class, 'viewAny']);
        // Gate::define('show-perfil', [PerfilPolicy::class, 'view']);
        // Gate::define('create-perfil', [PerfilPolicy::class, 'create']);
        // Gate::define('update-perfil', [PerfilPolicy::class, 'update']);
        // Gate::define('delete-perfil', [PerfilPolicy::class, 'delete']);


        // Gate::define('index-modulo', [ModuloPolicy::class, 'viewAny']);
        // Gate::define('show-modulo', [ModuloPolicy::class, 'view']);
        // Gate::define('create-modulo', [ModuloPolicy::class, 'create']);
        // Gate::define('update-modulo', [ModuloPolicy::class, 'update']);
        // Gate::define('delete-modulo', [ModuloPolicy::class, 'delete']);


        // Gate::define('index-autorizado', [AutorizadoPolicy::class, 'viewAny']);
        // Gate::define('show-autorizado', [AutorizadoPolicy::class, 'view']);
        // Gate::define('create-autorizado', [AutorizadoPolicy::class, 'create']);
        // Gate::define('update-autorizado', [AutorizadoPolicy::class, 'update']);
        // Gate::define('delete-autorizado', [AutorizadoPolicy::class, 'delete']);
    }
}
