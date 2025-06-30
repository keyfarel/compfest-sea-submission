<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// Pastikan RoleModel juga berada di namespace yang sama atau di-import jika perlu
// use App\Models\RoleModel;

class UserModel extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'm_user';

    protected $fillable = [
        'name',
        'email',
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
}
