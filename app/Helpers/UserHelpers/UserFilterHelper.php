<?php

namespace App\Helpers\UserHelpers;

use Illuminate\Support\Collection;

class UserFilterHelper
{
    public static function filterUsers(Collection $users, string $search = '', string $role = 'Semua Peran'): Collection
    {
        return $users->filter(function ($user) use ($search, $role) {
            $searchMatch = empty($search) ||
                stripos($user['name'], $search) !== false ||
                stripos($user['email'], $search) !== false;

            $roleMatch = $role === 'Semua Peran' || $user['role'] === $role;

            return $searchMatch && $roleMatch;
        });
    }

    public static function applyUserStyling(Collection $users): Collection
    {
        return $users->map(function ($user) {
            return UserHelper::addUserStyling($user);
        });
    }
}
