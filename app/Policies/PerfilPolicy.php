<?php

namespace App\Policies;

use App\Models\Perfil;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PerfilPolicy
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
        foreach ($user->Perfiles as $perfil) {
            if($perfil->ativo){
                foreach($perfil->autorizados as $autorizacao){
                    if(
                           $autorizacao->tipo == "index-perfil"
                        or $autorizacao->tipo == "all-perfil"

                    ){
                        return true;
                    }
                    foreach (PerfilPolicy::AUTORIZACAO_EXTRA['viewAny'] as $autorizacao_extra) {
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
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Perfil $perfil)
    {
        foreach ($user->Perfiles as $perfil) {
            if($perfil->ativo){
                foreach($perfil->autorizados as $autorizacao){
                    if(
                           $autorizacao->tipo == "show-perfil"
                        or $autorizacao->tipo == "all-perfil"
                    ){
                        return true;
                    }
                    foreach (PerfilPolicy::AUTORIZACAO_EXTRA['view'] as $autorizacao_extra) {
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
        foreach ($user->Perfiles as $perfil) {
            if($perfil->ativo){
                foreach($perfil->autorizados as $autorizacao){
                    if(
                           $autorizacao->tipo == "create-perfil"
                        or $autorizacao->tipo == "all-perfil"
                    ){
                        return true;
                    }
                    foreach (PerfilPolicy::AUTORIZACAO_EXTRA['create'] as $autorizacao_extra) {
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
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Perfil $perfil)
    {
        foreach ($user->Perfiles as $perfil) {
            if($perfil->ativo){
                foreach($perfil->autorizados as $autorizacao){
                    if(
                           $autorizacao->tipo == "update-perfil"
                        or $autorizacao->tipo == "all-perfil"
                    ){
                        return true;
                    }
                    foreach (PerfilPolicy::AUTORIZACAO_EXTRA['update'] as $autorizacao_extra) {
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
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Perfil $perfil)
    {
        foreach ($user->Perfiles as $perfil) {
            if($perfil->ativo){
                foreach($perfil->autorizados as $autorizacao){
                    if(
                           $autorizacao->tipo == "delete-perfil"
                        or $autorizacao->tipo == "all-perfil"
                    ){
                        return true;
                    }
                    foreach (PerfilPolicy::AUTORIZACAO_EXTRA['delete'] as $autorizacao_extra) {
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
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Perfil $perfil)
    {
        return true;
        foreach ($user->Perfiles as $perfil) {
            if($perfil->ativo){
                foreach($perfil->autorizados as $autorizacao){
                    if(
                        $autorizacao->tipo == "restore-perfil" or $autorizacao->tipo == "all-perfil"
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
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Perfil $perfil)
    {
        return true;
        foreach ($user->Perfiles as $perfil) {
            if($perfil->ativo){
                foreach($perfil->autorizados as $autorizacao){
                    if(
                        $autorizacao->tipo == "force-delete-perfil" or $autorizacao->tipo == "all-perfil"
                    ){
                        return Response::allow();
                    }
                }
            }
        }
        return Response::deny(message:'comando invalido');
    }
}
