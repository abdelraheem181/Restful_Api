<?php

namespace App\Policies;


use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    use HandlesAuthorization;
    
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        
        return $user->role === "admin"
        ? Response::allow()
        : Response::deny('You do not have permission to create new user.');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): Response
    {
        return  $user->id === $model->id    ||     $user->role === "admin"
        ? Response::allow()
        : Response::deny('You do not have permission to create new user.');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): Response
    {
        return  $user->id === $model->id    ||     $user->role === "admin"
        ? Response::allow()
        : Response::deny('You do not have permission to create new user.');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): bool
    {
        //
    }
}
