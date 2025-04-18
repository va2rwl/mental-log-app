<?php

namespace App\Policies;

use App\Models\DailyLog;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DailyLogPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, DailyLog $dailyLog): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    // app/Policies/DailyLogPolicy.php

    public function update(User $user, DailyLog $dailyLog)
    {
        return $user->id === $dailyLog->user_id;
    }


    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, DailyLog $dailyLog): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, DailyLog $dailyLog): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, DailyLog $dailyLog): bool
    {
        return false;
    }
}
