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
        if(NoPolicy::autorizacao($user, "index-perfil", "all-perfil", PerfilPolicy::AUTORIZACAO_EXTRA['viewAny'])){
            return true;
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
        if(NoPolicy::autorizacao($user, "show-perfil", "all-perfil", PerfilPolicy::AUTORIZACAO_EXTRA['view'])){
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
        if(NoPolicy::autorizacao($user, "create-perfil", "all-perfil", PerfilPolicy::AUTORIZACAO_EXTRA['create'])){
            return true;
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
        if(NoPolicy::autorizacao($user, "update-perfil", "all-perfil", PerfilPolicy::AUTORIZACAO_EXTRA['update'])){
            return true;
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
        if(NoPolicy::autorizacao($user, "delete-perfil", "all-perfil", PerfilPolicy::AUTORIZACAO_EXTRA['delete'])){
            return true;
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
    }
}
