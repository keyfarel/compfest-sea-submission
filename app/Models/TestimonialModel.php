<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TestimonialModel extends Model
{
    use HasFactory;

    protected $table = 'm_testimonials';
    protected $fillable = [
        'user_id',
        'name',
        'location',
        'rating',
        'quote',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(UserModel::class, 'user_id');
    }
}
