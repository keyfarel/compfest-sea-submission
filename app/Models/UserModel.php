<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserModel extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'm_user';
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'password',
        'role_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo(RoleModel::class, 'role_id');
    }

    public function testimonials(): HasMany
    {
        return $this->hasMany(TestimonialModel::class, 'user_id');
    }

    public function subscriptions(): HasMany
    {
        return $this->hasMany(SubscriptionModel::class, 'user_id');
    }
}
