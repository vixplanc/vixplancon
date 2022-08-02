<?php

namespace App\Providers;

use App\Models\Consolidado;
use App\Models\Equipamento;
use App\Models\User;
use App\Policies\ConsolidadoPolicy;
use App\Policies\EquipamentoPolicy;
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
        // Equipamento::class => EquipamentoPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('index-consolidado', [ConsolidadoPolicy::class, 'viewAny']);
        Gate::define('show-consolidado', [ConsolidadoPolicy::class, 'view']);
        Gate::define('create-consolidado', [ConsolidadoPolicy::class, 'create']);
        Gate::define('update-consolidado', [ConsolidadoPolicy::class, 'update']);
        Gate::define('delete-consolidado', [ConsolidadoPolicy::class, 'delete']);


        Gate::define('index-equipamento', [EquipamentoPolicy::class, 'viewAny']);
        Gate::define('show-equipamento', [EquipamentoPolicy::class, 'view']);
        Gate::define('create-equipamento', [EquipamentoPolicy::class, 'create']);
        Gate::define('update-equipamento', [EquipamentoPolicy::class, 'update']);
        Gate::define('delete-equipamento', [EquipamentoPolicy::class, 'delete']);


        Gate::define('index-contrato', [ContratoPolicy::class, 'viewAny']);
        Gate::define('show-contrato', [ContratoPolicy::class, 'view']);
        Gate::define('create-contrato', [ContratoPolicy::class, 'create']);
        Gate::define('update-contrato', [ContratoPolicy::class, 'update']);
        Gate::define('delete-contrato', [ContratoPolicy::class, 'delete']);
    }
}
