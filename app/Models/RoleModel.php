<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoleModel extends Model
{
    use HasFactory;

    protected $table = 'm_role';

    protected $fillable = ['name'];

    public function users()
    {
        return $this->hasMany(UserModel::class, 'role_id');
    }
}
