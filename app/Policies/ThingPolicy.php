<?php

namespace App\Policies;

use App\Models\Thing;
use App\Models\User;

class ThingPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Thing $thing): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Thing $thing): bool
    {
        return true;
    }

    public function delete(User $user, Thing $thing): bool
    {
        return true;
    }

    public function restore(User $user, Thing $thing): bool
    {
        return true;
    }

    public function forceDelete(User $user, Thing $thing): bool
    {
        return true;
    }
}
