<?php

namespace App\Policies;

use App\Models\Colaborador;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ColaboradorPolicy
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
        foreach ($user->Colaboradores as $colaborador) {
            if($colaborador->ativo){
                foreach($colaborador->autorizados as $autorizacao){
                    if(
                           $autorizacao->tipo == "index-colaborador"
                        or $autorizacao->tipo == "all-colaborador"

                    ){
                        return true;
                    }
                    foreach (ColaboradorPolicy::AUTORIZACAO_EXTRA['viewAny'] as $autorizacao_extra) {
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
     * @param  \App\Models\Colaborador  $colaborador
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Colaborador $colaborador)
    {
        foreach ($user->Colaboradores as $colaborador) {
            if($colaborador->ativo){
                foreach($colaborador->autorizados as $autorizacao){
                    if(
                           $autorizacao->tipo == "show-colaborador"
                        or $autorizacao->tipo == "all-colaborador"
                    ){
                        return true;
                    }
                    foreach (ColaboradorPolicy::AUTORIZACAO_EXTRA['view'] as $autorizacao_extra) {
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
        foreach ($user->Colaboradores as $colaborador) {
            if($colaborador->ativo){
                foreach($colaborador->autorizados as $autorizacao){
                    if(
                           $autorizacao->tipo == "create-colaborador"
                        or $autorizacao->tipo == "all-colaborador"
                    ){
                        return true;
                    }
                    foreach (ColaboradorPolicy::AUTORIZACAO_EXTRA['create'] as $autorizacao_extra) {
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
     * @param  \App\Models\Colaborador  $colaborador
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Colaborador $colaborador)
    {
        foreach ($user->Colaboradores as $colaborador) {
            if($colaborador->ativo){
                foreach($colaborador->autorizados as $autorizacao){
                    if(
                           $autorizacao->tipo == "update-colaborador"
                        or $autorizacao->tipo == "all-colaborador"
                    ){
                        return true;
                    }
                    foreach (ColaboradorPolicy::AUTORIZACAO_EXTRA['update'] as $autorizacao_extra) {
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
     * @param  \App\Models\Colaborador  $colaborador
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Colaborador $colaborador)
    {
        foreach ($user->Colaboradores as $colaborador) {
            if($colaborador->ativo){
                foreach($colaborador->autorizados as $autorizacao){
                    if(
                           $autorizacao->tipo == "delete-colaborador"
                        or $autorizacao->tipo == "all-colaborador"
                    ){
                        return true;
                    }
                    foreach (ColaboradorPolicy::AUTORIZACAO_EXTRA['delete'] as $autorizacao_extra) {
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
     * @param  \App\Models\Colaborador  $colaborador
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Colaborador $colaborador)
    {
        return true;
        foreach ($user->Colaboradores as $colaborador) {
            if($colaborador->ativo){
                foreach($colaborador->autorizados as $autorizacao){
                    if(
                        $autorizacao->tipo == "restore-colaborador" or $autorizacao->tipo == "all-colaborador"
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
     * @param  \App\Models\Colaborador  $colaborador
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Colaborador $colaborador)
    {
        return true;
        foreach ($user->Colaboradores as $colaborador) {
            if($colaborador->ativo){
                foreach($colaborador->autorizados as $autorizacao){
                    if(
                        $autorizacao->tipo == "force-delete-colaborador" or $autorizacao->tipo == "all-colaborador"
                    ){
                        return Response::allow();
                    }
                }
            }
        }
        return Response::deny(message:'comando invalido');
    }
}
