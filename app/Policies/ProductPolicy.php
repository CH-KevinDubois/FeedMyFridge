<?php

namespace App\Policies;

use App\Models\Fridge;
use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    public function delete(User $user, Fridge $fridge, Product $product)
    {
        return $user->id === $fridge->user_id && $fridge->id === $product->fridge_id;
    }
}
