<?php

namespace App\Policies;

use App\Models\Location;
use App\Models\User;

class LocationPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Location $location): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Location $location): bool
    {
        return true;
    }

    public function delete(User $user, Location $location): bool
    {
        return true;
    }

    public function restore(User $user, Location $location): bool
    {
        return true;
    }

    public function forceDelete(User $user, Location $location): bool
    {
        return true;
    }
}
