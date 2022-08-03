<?php

namespace App\Policies;

use App\Models\Perfil;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class NoPolicy
{
    use HandlesAuthorization;

    static public function autorizacao(User $user,string $tipo, string $admin_access, Array $extra=null)
    {
        foreach ($user->Colaboradores as $colaborador) {
            if($colaborador->ativo){
                foreach($colaborador->autorizados as $autorizacao){
                    if(
                              $autorizacao->tipo == $tipo
                           or $autorizacao->tipo == $admin_access
                    ){
                        return true;
                    }
                    foreach ($extra as $autorizacao_extra) {
                        if ($autorizacao->tipo == $autorizacao_extra) {
                            return true;
                        }
                    }
                }
            }
        }
        return false;
    }

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
        return true;
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
        return true;
    }


    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return true;
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
        return true;
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
        return true;
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
