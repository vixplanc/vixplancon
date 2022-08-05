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
        if(NoPolicy::autorizacao($user, "index-modulo", "all-modulo", ModuloPolicy::AUTORIZACAO_EXTRA['viewAny'])){
            return true;
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
        if(NoPolicy::autorizacao($user, "show-modulo", "all-modulo", ModuloPolicy::AUTORIZACAO_EXTRA['view'])){
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
        if(NoPolicy::autorizacao($user, "create-modulo", "all-modulo", ModuloPolicy::AUTORIZACAO_EXTRA['create'])){
            return true;
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
        if(NoPolicy::autorizacao($user, "update-modulo", "all-modulo", ModuloPolicy::AUTORIZACAO_EXTRA['update'])){
            return true;
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
        if(NoPolicy::autorizacao($user, "delete-modulo", "all-modulo", ModuloPolicy::AUTORIZACAO_EXTRA['delete'])){
            return true;
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
    }
}
