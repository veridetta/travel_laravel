<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\TopBanner;
use App\Models\User;

class TopBannerPolicy
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
    public function view(User $user, TopBanner $topBanner)
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
    public function update(User $user, TopBanner $topBanner)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, TopBanner $topBanner)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, TopBanner $topBanner)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, TopBanner $topBanner)
    {
        //
    }
}
