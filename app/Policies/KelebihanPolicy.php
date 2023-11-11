<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Kelebihan;
use App\Models\User;

class KelebihanPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
      if($user->role=='user' or $user->role=='agent'){
        return false;
      }else{
        if($user->hasPermissionTo('View Permissions')){
            return true;
        }
      }
      return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Kelebihan $kelebihan)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Kelebihan $kelebihan)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Kelebihan $kelebihan)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Kelebihan $kelebihan)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Kelebihan $kelebihan)
    {
        //
    }
}
