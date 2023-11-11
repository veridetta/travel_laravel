<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Travel;
use App\Models\User;

class TravelPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
      if($user->role=='user'){
        return false;
      }else{
        if($user->role='agent'){
          return true;
        }else
        if($user->hasPermissionTo('View Permissions')){
            return true;
        }
      }
      return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Travel $travel)
    {
      if($user->role=='user'){
        return false;
      }else{
        if($user->role='agent'){
          return true;
        }else
        if($user->hasPermissionTo('View Permissions')){
            return true;
        }
      }
      return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
      if($user->role=='user'){
        return false;
      }else{
        if($user->role='agent'){
          return true;
        }else
        if($user->hasPermissionTo('View Permissions')){
            return true;
        }
      }
      return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Travel $travel)
    {
      if($user->role=='user'){
        return false;
      }else{
        if($user->role='agent'){
          return true;
        }else
        if($user->hasPermissionTo('View Permissions')){
            return true;
        }
      }
      return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Travel $travel)
    {
        if($user->role=='user'){
        return false;
      }else{
        if($user->role='agent'){
          return true;
        }else
        if($user->hasPermissionTo('View Permissions')){
            return true;
        }
      }
      return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Travel $travel)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Travel $travel)
    {
        //
    }
}
