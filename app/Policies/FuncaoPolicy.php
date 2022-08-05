<?php

namespace App\Policies;

use App\Models\Funcao;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class FuncaoPolicy
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
        if(NoPolicy::autorizacao($user, "index-funcao", "all-funcao", ModuloPolicy::AUTORIZACAO_EXTRA['viewAny'])){
            return true;
        }
        return false;
    }


    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Funcao  $funcao
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Funcao $funcao)
    {
        if(NoPolicy::autorizacao($user, "show-funcao", "all-funcao", ModuloPolicy::AUTORIZACAO_EXTRA['view'])){
            return true;
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
        if(NoPolicy::autorizacao($user, "create-funcao", "all-funcao", ModuloPolicy::AUTORIZACAO_EXTRA['create'])){
            return true;
        }
        return false;
    }


    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Funcao  $funcao
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Funcao $funcao)
    {
        if(NoPolicy::autorizacao($user, "update-funcao", "all-funcao", ModuloPolicy::AUTORIZACAO_EXTRA['update'])){
            return true;
        }
        return false;
    }


    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Funcao  $funcao
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Funcao $funcao)
    {
        if(NoPolicy::autorizacao($user, "delete-funcao", "all-funcao", ModuloPolicy::AUTORIZACAO_EXTRA['delete'])){
            return true;
        }
        return false;
    }


    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Funcao  $funcao
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Funcao $funcao)
    {
        return true;
    }


    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Funcao  $funcao
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Funcao $funcao)
    {
        return true;
    }
}
