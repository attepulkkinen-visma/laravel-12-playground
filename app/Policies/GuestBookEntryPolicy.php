<?php

namespace App\Policies;

use App\Models\GuestBookEntry;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GuestBookEntryPolicy
{
    use HandlesAuthorization;

    public function before(User $user, string $ability): bool|null
    {
        if ($user->is_admin) {
            return true;
        }

        return null;
    }

    public function viewAny(User $user): true
    {
        return true;
    }

    public function view(User $user, GuestBookEntry $guestBookEntry): true
    {
        return true;
    }

    public function create(User $user): true
    {
        return true;
    }

    public function update(User $user, GuestBookEntry $guestBookEntry): bool
    {
        return $user->id === $guestBookEntry->user_id;
    }

    public function delete(User $user, GuestBookEntry $guestBookEntry): bool
    {
        return $user->id === $guestBookEntry->user_id;
    }

}
