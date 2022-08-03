<?php

namespace App\Policies;

use App\Models\Modulo;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ModuloPolicy
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
        foreach ($user->Moduloes as $modulo) {
            if($modulo->ativo){
                foreach($modulo->autorizados as $autorizacao){
                    if(
                           $autorizacao->tipo == "index-modulo"
                        or $autorizacao->tipo == "all-modulo"

                    ){
                        return true;
                    }
                    foreach (ModuloPolicy::AUTORIZACAO_EXTRA['viewAny'] as $autorizacao_extra) {
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
     * @param  \App\Models\Modulo  $modulo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Modulo $modulo)
    {
        foreach ($user->Moduloes as $modulo) {
            if($modulo->ativo){
                foreach($modulo->autorizados as $autorizacao){
                    if(
                           $autorizacao->tipo == "show-modulo"
                        or $autorizacao->tipo == "all-modulo"
                    ){
                        return true;
                    }
                    foreach (ModuloPolicy::AUTORIZACAO_EXTRA['view'] as $autorizacao_extra) {
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
        foreach ($user->Moduloes as $modulo) {
            if($modulo->ativo){
                foreach($modulo->autorizados as $autorizacao){
                    if(
                           $autorizacao->tipo == "create-modulo"
                        or $autorizacao->tipo == "all-modulo"
                    ){
                        return true;
                    }
                    foreach (ModuloPolicy::AUTORIZACAO_EXTRA['create'] as $autorizacao_extra) {
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
     * @param  \App\Models\Modulo  $modulo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Modulo $modulo)
    {
        foreach ($user->Moduloes as $modulo) {
            if($modulo->ativo){
                foreach($modulo->autorizados as $autorizacao){
                    if(
                           $autorizacao->tipo == "update-modulo"
                        or $autorizacao->tipo == "all-modulo"
                    ){
                        return true;
                    }
                    foreach (ModuloPolicy::AUTORIZACAO_EXTRA['update'] as $autorizacao_extra) {
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
     * @param  \App\Models\Modulo  $modulo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Modulo $modulo)
    {
        foreach ($user->Moduloes as $modulo) {
            if($modulo->ativo){
                foreach($modulo->autorizados as $autorizacao){
                    if(
                           $autorizacao->tipo == "delete-modulo"
                        or $autorizacao->tipo == "all-modulo"
                    ){
                        return true;
                    }
                    foreach (ModuloPolicy::AUTORIZACAO_EXTRA['delete'] as $autorizacao_extra) {
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
     * @param  \App\Models\Modulo  $modulo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Modulo $modulo)
    {
        return true;
        foreach ($user->Moduloes as $modulo) {
            if($modulo->ativo){
                foreach($modulo->autorizados as $autorizacao){
                    if(
                        $autorizacao->tipo == "restore-modulo" or $autorizacao->tipo == "all-modulo"
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
     * @param  \App\Models\Modulo  $modulo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Modulo $modulo)
    {
        return true;
        foreach ($user->Moduloes as $modulo) {
            if($modulo->ativo){
                foreach($modulo->autorizados as $autorizacao){
                    if(
                        $autorizacao->tipo == "force-delete-modulo" or $autorizacao->tipo == "all-modulo"
                    ){
                        return Response::allow();
                    }
                }
            }
        }
        return Response::deny(message:'comando invalido');
    }
}
