<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class DeliveryDayModel extends Model
{
    use HasFactory;

    protected $table = 'delivery_days';
    protected $fillable = ['name', 'day_of_week'];

    public function subscriptions(): BelongsToMany
    {
        return $this->belongsToMany(
            SubscriptionModel::class,
            'subscription_delivery_day',
            'delivery_day_id',
            'subscription_id'
        );
    }
}
