<?php

namespace App\Policies;

use App\Models\Contrato;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ContratoPolicy
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
                           $autorizacao->tipo == "index-contrato"
                        or $autorizacao->tipo == "all-contrato"

                    ){
                        return true;
                    }
                    foreach (ContratoPolicy::AUTORIZACAO_EXTRA['viewAny'] as $autorizacao_extra) {
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
     * @param  \App\Models\Contrato  $contrato
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Contrato $contrato)
    {
        foreach ($user->Colaboradores as $colaborador) {
            if($colaborador->ativo){
                foreach($colaborador->autorizados as $autorizacao){
                    if(
                           $autorizacao->tipo == "show-contrato"
                        or $autorizacao->tipo == "all-contrato"
                    ){
                        return true;
                    }
                    foreach (ContratoPolicy::AUTORIZACAO_EXTRA['view'] as $autorizacao_extra) {
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
                           $autorizacao->tipo == "create-contrato"
                        or $autorizacao->tipo == "all-contrato"
                    ){
                        return true;
                    }
                    foreach (ContratoPolicy::AUTORIZACAO_EXTRA['create'] as $autorizacao_extra) {
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
     * @param  \App\Models\Contrato  $contrato
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Contrato $contrato)
    {
        foreach ($user->Colaboradores as $colaborador) {
            if($colaborador->ativo){
                foreach($colaborador->autorizados as $autorizacao){
                    if(
                           $autorizacao->tipo == "update-contrato"
                        or $autorizacao->tipo == "all-contrato"
                    ){
                        return true;
                    }
                    foreach (ContratoPolicy::AUTORIZACAO_EXTRA['update'] as $autorizacao_extra) {
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
     * @param  \App\Models\Contrato  $contrato
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Contrato $contrato)
    {
        foreach ($user->Colaboradores as $colaborador) {
            if($colaborador->ativo){
                foreach($colaborador->autorizados as $autorizacao){
                    if(
                           $autorizacao->tipo == "delete-contrato"
                        or $autorizacao->tipo == "all-contrato"
                    ){
                        return true;
                    }
                    foreach (ContratoPolicy::AUTORIZACAO_EXTRA['delete'] as $autorizacao_extra) {
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
     * @param  \App\Models\Contrato  $contrato
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Contrato $contrato)
    {
        return true;
        foreach ($user->Colaboradores as $colaborador) {
            if($colaborador->ativo){
                foreach($colaborador->autorizados as $autorizacao){
                    if(
                        $autorizacao->tipo == "restore-contrato" or $autorizacao->tipo == "all-contrato"
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
     * @param  \App\Models\Contrato  $contrato
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Contrato $contrato)
    {
        return true;
        foreach ($user->Colaboradores as $colaborador) {
            if($colaborador->ativo){
                foreach($colaborador->autorizados as $autorizacao){
                    if(
                        $autorizacao->tipo == "force-delete-contrato" or $autorizacao->tipo == "all-contrato"
                    ){
                        return Response::allow();
                    }
                }
            }
        }
        return Response::deny(message:'comando invalido');
    }
}
