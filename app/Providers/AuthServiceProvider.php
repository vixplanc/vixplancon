<?php

namespace App\Providers;

use App\Models\Consolidado;
use App\Models\User;
use App\Policies\ConsolidadoPolicy;
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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Consolidado::class => ConsolidadoPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Gate::define(ability:'update', callback:function (User $user, Consolidado $consolidado){
        //     // dd("ola mundo");
        //     foreach ($user->Colaboradores as $colaborador) {
        //         if($colaborador->ativo){
        //             foreach($colaborador->autorizados as $autorizacao){
        //                 if(
        //                     $autorizacao->modulo->nome == 'Consolidado'
        //                     and ($autorizacao->tipo == "viewany" or $autorizacao->tipo == "all")
        //                 ){
        //                     return true;
        //                 }
        //             }
        //         }
        //     }
        //     return false;
        // });
        // Gate::define('update', [ConsolidadoPolicy::class, 'update']);
        // Gate::define('delete', [ConsolidadoPolicy::class, 'delete']);
    }
}
