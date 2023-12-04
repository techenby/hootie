<?php

namespace App\Policies;

use App\Models\Bin;
use App\Models\User;

class BinPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Bin $bin): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Bin $bin): bool
    {
        return true;
    }

    public function delete(User $user, Bin $bin): bool
    {
        return true;
    }

    public function restore(User $user, Bin $bin): bool
    {
        return true;
    }

    public function forceDelete(User $user, Bin $bin): bool
    {
        return true;
    }
}
