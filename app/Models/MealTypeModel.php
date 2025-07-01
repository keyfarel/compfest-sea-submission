<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class MealTypeModel extends Model
{
    use HasFactory;

    protected $table = 'meal_types';

    protected $fillable = ['name'];

    public function subscriptions(): BelongsToMany
    {
        return $this->belongsToMany(
            SubscriptionModel::class,
            'subscription_meal_type',
            'meal_type_id',
            'subscription_id'
        );
    }

}
