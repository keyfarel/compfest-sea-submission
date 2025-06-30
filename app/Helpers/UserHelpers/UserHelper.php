<?php

namespace App\Helpers\UserHelpers;

class UserHelper
{
    private static array $avatarColors = [
        ['bg' => 'bg-purple-100', 'text' => 'text-purple-700'],
        ['bg' => 'bg-blue-100', 'text' => 'text-blue-700'],
        ['bg' => 'bg-green-100', 'text' => 'text-green-700'],
        ['bg' => 'bg-yellow-100', 'text' => 'text-yellow-700'],
        ['bg' => 'bg-pink-100', 'text' => 'text-pink-700'],
        ['bg' => 'bg-indigo-100', 'text' => 'text-indigo-700'],
        ['bg' => 'bg-red-100', 'text' => 'text-red-700'],
        ['bg' => 'bg-teal-100', 'text' => 'text-teal-700'],
        ['bg' => 'bg-orange-100', 'text' => 'text-orange-700'],
        ['bg' => 'bg-cyan-100', 'text' => 'text-cyan-700'],
    ];

    public static function generateInitials(string $name): string
    {
        $words = array_filter(explode(' ', trim($name)));
        $initials = '';

        for ($i = 0; $i < min(2, count($words)); $i++) {
            $initials .= strtoupper(substr($words[$i], 0, 1));
        }

        if (strlen($initials) < 2) {
            if (count($words) == 1 && strlen($words[0]) > 1) {
                $initials = strtoupper(substr($words[0], 0, 1));
            } else {
                $initials = str_pad($initials, 2, 'X');
            }
        }

        return $initials;
    }

    public static function generateAvatarColors(int $userId): array
    {
        $colorIndex = $userId % count(self::$avatarColors);
        return self::$avatarColors[$colorIndex];
    }

    public static function generateRoleStyle(string $role): array
    {
        $normalizedRole = ucfirst(strtolower($role));

        return match($normalizedRole) {
            'Admin' => ['bg' => 'bg-purple-100', 'text' => 'text-purple-800'],
            'User' => ['bg' => 'bg-green-100', 'text' => 'text-green-800'],
            default => ['bg' => 'bg-gray-100', 'text' => 'text-gray-800']
        };
    }

    public static function addUserStyling(array $user): array
    {
        $avatarColors = self::generateAvatarColors($user['id']);
        $user['avatar_bg'] = $avatarColors['bg'];
        $user['avatar_text'] = $avatarColors['text'];

        $roleStyle = self::generateRoleStyle($user['role']);
        $user['role_bg'] = $roleStyle['bg'];
        $user['role_text'] = $roleStyle['text'];

        $user['initial'] = self::generateInitials($user['name']);

        return $user;
    }
}
