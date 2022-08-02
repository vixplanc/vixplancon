<?php

namespace App\Policies;

use App\Models\Equipamento;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class EquipamentoPolicy
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
                           $autorizacao->tipo == "index-equipamento"
                        or $autorizacao->tipo == "all-equipamento"

                    ){
                        return true;
                    }
                    foreach (EquipamentoPolicy::AUTORIZACAO_EXTRA['viewAny'] as $autorizacao_extra) {
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
     * @param  \App\Models\Equipamento  $equipamento
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Equipamento $equipamento)
    {
        foreach ($user->Colaboradores as $colaborador) {
            if($colaborador->ativo){
                foreach($colaborador->autorizados as $autorizacao){
                    if(
                           $autorizacao->tipo == "show-equipamento"
                        or $autorizacao->tipo == "all-equipamento"
                    ){
                        return true;
                    }
                    foreach (EquipamentoPolicy::AUTORIZACAO_EXTRA['view'] as $autorizacao_extra) {
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
                           $autorizacao->tipo == "create-equipamento"
                        or $autorizacao->tipo == "all-equipamento"
                    ){
                        return true;
                    }
                    foreach (EquipamentoPolicy::AUTORIZACAO_EXTRA['create'] as $autorizacao_extra) {
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
     * @param  \App\Models\Equipamento  $equipamento
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Equipamento $equipamento)
    {
        foreach ($user->Colaboradores as $colaborador) {
            if($colaborador->ativo){
                foreach($colaborador->autorizados as $autorizacao){
                    if(
                           $autorizacao->tipo == "update-equipamento"
                        or $autorizacao->tipo == "all-equipamento"
                    ){
                        return true;
                    }
                    foreach (EquipamentoPolicy::AUTORIZACAO_EXTRA['update'] as $autorizacao_extra) {
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
     * @param  \App\Models\Equipamento  $equipamento
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Equipamento $equipamento)
    {
        foreach ($user->Colaboradores as $colaborador) {
            if($colaborador->ativo){
                foreach($colaborador->autorizados as $autorizacao){
                    if(
                           $autorizacao->tipo == "delete-equipamento"
                        or $autorizacao->tipo == "all-equipamento"
                    ){
                        return true;
                    }
                    foreach (EquipamentoPolicy::AUTORIZACAO_EXTRA['delete'] as $autorizacao_extra) {
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
     * @param  \App\Models\Equipamento  $equipamento
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Equipamento $equipamento)
    {
        return true;
        foreach ($user->Colaboradores as $colaborador) {
            if($colaborador->ativo){
                foreach($colaborador->autorizados as $autorizacao){
                    if(
                        $autorizacao->tipo == "restore-equipamento" or $autorizacao->tipo == "all-equipamento"
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
     * @param  \App\Models\Equipamento  $equipamento
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Equipamento $equipamento)
    {
        return true;
        foreach ($user->Colaboradores as $colaborador) {
            if($colaborador->ativo){
                foreach($colaborador->autorizados as $autorizacao){
                    if(
                        $autorizacao->tipo == "force-delete-equipamento" or $autorizacao->tipo == "all-equipamento"
                    ){
                        return Response::allow();
                    }
                }
            }
        }
        return Response::deny(message:'comando invalido');
    }
}
