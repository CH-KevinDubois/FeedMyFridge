<?php

namespace App\Policies;

use App\Models\Fridge;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FridgePolicy
{
    use HandlesAuthorization;

    public function delete(User $user, Fridge $fridge)
    {
        return $user->id === $fridge->user_id;
    }
}
