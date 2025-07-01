<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubscriptionStatusHistoryModel extends Model
{
    use HasFactory;

    protected $table = 'subscription_status_histories';

    protected $fillable = [
        'subscription_id',
        'status',
        'notes',
        'pause_start_date',
        'pause_end_date',
    ];

    protected $casts = [
        'pause_start_date' => 'date',
        'pause_end_date' => 'date',
    ];

    protected static function booted(): void
    {
        static::created(function (SubscriptionStatusHistoryModel $history) {
            $history->subscription->update([
                'latest_status' => $history->status
            ]);
        });
    }

    public function subscription(): BelongsTo
    {
        return $this->belongsTo(SubscriptionModel::class, 'subscription_id');
    }
}
