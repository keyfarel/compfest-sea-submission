<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PlanModel extends Model
{
    use HasFactory;

    protected $table = 'plans';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
    ];

    public function subscriptions(): HasMany
    {
        return $this->hasMany(SubscriptionModel::class);
    }
}
