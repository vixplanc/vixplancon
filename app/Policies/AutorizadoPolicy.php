<?php

namespace App\Policies;

use App\Models\Autorizado;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class AutorizadoPolicy
{
    use HandlesAuthorization;

    public const AUTORIZACAO_EXTRA = [
        "viewAny"=>[

        ],
        "view"=>[

        ],
        "create"=>[

        ],
        "update"=>[

        ],
        "delete"=>[

        ],

    ];

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        foreach ($user->Autorizadoes as $autorizado) {
            if($autorizado->ativo){
                foreach($autorizado->autorizados as $autorizacao){
                    if(
                           $autorizacao->tipo == "index-autorizado"
                        or $autorizacao->tipo == "all-autorizado"

                    ){
                        return true;
                    }
                    foreach (AutorizadoPolicy::AUTORIZACAO_EXTRA['viewAny'] as $autorizacao_extra) {
                        if ($autorizacao->tipo == $autorizacao_extra) {
                            return true;
                        }
                    }
                }
            }
        }
        return false;
    }


    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Autorizado  $autorizado
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Autorizado $autorizado)
    {
        foreach ($user->Autorizadoes as $autorizado) {
            if($autorizado->ativo){
                foreach($autorizado->autorizados as $autorizacao){
                    if(
                           $autorizacao->tipo == "show-autorizado"
                        or $autorizacao->tipo == "all-autorizado"
                    ){
                        return true;
                    }
                    foreach (AutorizadoPolicy::AUTORIZACAO_EXTRA['view'] as $autorizacao_extra) {
                        if ($autorizacao->tipo == $autorizacao_extra) {
                            return true;
                        }
                    }
                }
            }
        }
        return false;
    }


    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        foreach ($user->Autorizadoes as $autorizado) {
            if($autorizado->ativo){
                foreach($autorizado->autorizados as $autorizacao){
                    if(
                           $autorizacao->tipo == "create-autorizado"
                        or $autorizacao->tipo == "all-autorizado"
                    ){
                        return true;
                    }
                    foreach (AutorizadoPolicy::AUTORIZACAO_EXTRA['create'] as $autorizacao_extra) {
                        if ($autorizacao->tipo == $autorizacao_extra) {
                            return true;
                        }
                    }
                }
            }
        }
        return false;
    }


    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Autorizado  $autorizado
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Autorizado $autorizado)
    {
        foreach ($user->Autorizadoes as $autorizado) {
            if($autorizado->ativo){
                foreach($autorizado->autorizados as $autorizacao){
                    if(
                           $autorizacao->tipo == "update-autorizado"
                        or $autorizacao->tipo == "all-autorizado"
                    ){
                        return true;
                    }
                    foreach (AutorizadoPolicy::AUTORIZACAO_EXTRA['update'] as $autorizacao_extra) {
                        if ($autorizacao->tipo == $autorizacao_extra) {
                            return true;
                        }
                    }
                }
            }
        }
        return false;
    }


    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Autorizado  $autorizado
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Autorizado $autorizado)
    {
        foreach ($user->Autorizadoes as $autorizado) {
            if($autorizado->ativo){
                foreach($autorizado->autorizados as $autorizacao){
                    if(
                           $autorizacao->tipo == "delete-autorizado"
                        or $autorizacao->tipo == "all-autorizado"
                    ){
                        return true;
                    }
                    foreach (AutorizadoPolicy::AUTORIZACAO_EXTRA['delete'] as $autorizacao_extra) {
                        if ($autorizacao->tipo == $autorizacao_extra) {
                            return true;
                        }
                    }
                }
            }
        }
        return false;
    }


    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Autorizado  $autorizado
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Autorizado $autorizado)
    {
        return true;
        foreach ($user->Autorizadoes as $autorizado) {
            if($autorizado->ativo){
                foreach($autorizado->autorizados as $autorizacao){
                    if(
                        $autorizacao->tipo == "restore-autorizado" or $autorizacao->tipo == "all-autorizado"
                    ){
                        return Response::allow();
                    }
                }
            }
        }
        return Response::deny(message:'comando invalido');
    }


    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Autorizado  $autorizado
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Autorizado $autorizado)
    {
        return true;
        foreach ($user->Autorizadoes as $autorizado) {
            if($autorizado->ativo){
                foreach($autorizado->autorizados as $autorizacao){
                    if(
                        $autorizacao->tipo == "force-delete-autorizado" or $autorizacao->tipo == "all-autorizado"
                    ){
                        return Response::allow();
                    }
                }
            }
        }
        return Response::deny(message:'comando invalido');
    }
}
