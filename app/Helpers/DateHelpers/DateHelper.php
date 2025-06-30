<?php

namespace App\Helpers\DateHelpers;

use Carbon\Carbon;

class DateHelper
{
    /**
     * Format date to Indonesian format (d M Y)
     */
    public static function formatToIndonesian(string $date): string
    {
        return Carbon::parse($date)->translatedFormat('d M Y');
    }

    /**
     * Format date with custom format
     */
    public static function formatDate(string $date, string $format = 'd M Y'): string
    {
        return Carbon::parse($date)->translatedFormat($format);
    }

    /**
     * Format datetime to Indonesian format
     */
    public static function formatDateTimeToIndonesian(string $datetime): string
    {
        return Carbon::parse($datetime)->translatedFormat('d M Y H:i');
    }

    /**
     * Get relative time (human readable)
     */
    public static function getRelativeTime(string $date): string
    {
        return Carbon::parse($date)->diffForHumans();
    }

    /**
     * Format join date specifically for user table
     */
    public static function formatJoinDate(string $date): string
    {
        return self::formatToIndonesian($date);
    }

    /**
     * Check if date is today
     */
    public static function isToday(string $date): bool
    {
        return Carbon::parse($date)->isToday();
    }

    /**
     * Check if date is within last week
     */
    public static function isWithinLastWeek(string $date): bool
    {
        return Carbon::parse($date)->isAfter(Carbon::now()->subWeek());
    }

    /**
     * Get formatted date with additional context (New, Recent, etc.)
     */
    public static function getFormattedDateWithContext(string $date): array
    {
        $formattedDate = self::formatToIndonesian($date);
        $context = '';

        if (self::isToday($date)) {
            $context = 'Hari ini';
        } elseif (self::isWithinLastWeek($date)) {
            $context = 'Baru';
        }

        return [
            'formatted_date' => $formattedDate,
            'context' => $context,
            'relative_time' => self::getRelativeTime($date)
        ];
    }
}
