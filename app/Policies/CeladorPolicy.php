<?php

namespace App\Policies;

use App\Models\Celador;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CeladorPolicy
{
    use HandlesAuthorization;

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
     * @param  \App\Models\Celador  $celador
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Celador $celador)
    {
        return $user->tipo_usuario_id == 3 || $user->tipo_usuario_id == 2;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->tipo_usuario_id == 3;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Celador  $celador
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Celador $celador)
    {
        return $user->tipo_usuario_id == 3 || $celador->id == $user->celador_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Celador  $celador
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Celador $celador)
    {
        return $user->tipo_usuario_id == 3;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Celador  $celador
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Celador $celador)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Celador  $celador
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Celador $celador)
    {
        //
    }
}
