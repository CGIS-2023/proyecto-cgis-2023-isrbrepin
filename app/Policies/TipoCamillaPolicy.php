<?php

namespace App\Policies;

use App\Models\TipoCamilla;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TipoCamillaPolicy
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
     * @param  \App\Models\TipoCamilla  $tipoCamilla
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, TipoCamilla $tipoCamilla)
    {
        return $user->tipo_usuario_id == 3 || return $user->tipo_usuario_id == 2;
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
     * @param  \App\Models\TipoCamilla  $tipoCamilla
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, TipoCamilla $tipoCamilla)
    {
        return $user->tipo_usuario_id == 3;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TipoCamilla  $tipoCamilla
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, TipoCamilla $tipoCamilla)
    {
        return $user->tipo_usuario_id == 3;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TipoCamilla  $tipoCamilla
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, TipoCamilla $tipoCamilla)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TipoCamilla  $tipoCamilla
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, TipoCamilla $tipoCamilla)
    {
        //
    }
}
