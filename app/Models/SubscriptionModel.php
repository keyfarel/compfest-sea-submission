<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SubscriptionModel extends Model
{
    use HasFactory;

    protected $table = 'subscriptions';

    protected $fillable = [
        'user_id',
        'plan_id',
        'latest_status',
        'full_name',
        'phone_number',
        'allergies',
        'monthly_total_price',
        'start_date',
    ];

    protected $casts = [
        'start_date' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(UserModel::class, 'user_id');
    }

    public function plan(): BelongsTo
    {
        return $this->belongsTo(PlanModel::class);
    }

    public function mealTypes(): BelongsToMany
    {
        return $this->belongsToMany(
            MealTypeModel::class,
            'subscription_meal_type',
            'subscription_id',
            'meal_type_id'
        );
    }

    public function deliveryDays(): BelongsToMany
    {
        return $this->belongsToMany(
            DeliveryDayModel::class,
            'subscription_delivery_day',
            'subscription_id',
            'delivery_day_id'
        );
    }

    public function statusHistories(): HasMany
    {
        return $this->hasMany(SubscriptionStatusHistoryModel::class, 'subscription_id')->latest();
    }

    public function currentStatus(): HasOne
    {
        return $this->hasOne(SubscriptionStatusHistoryModel::class, 'subscription_id')->latestOfMany();
    }

    public function latestPauseHistory(): HasOne
    {
        return $this->hasOne(SubscriptionStatusHistoryModel::class, 'subscription_id')
            ->where('status', 'dijeda')
            ->latestOfMany();
    }
}
