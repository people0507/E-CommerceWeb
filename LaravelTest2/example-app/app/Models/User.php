<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable = ['user_email', 'user_name', 'user_password'];
    public function getAuthPassword()
    {
        return $this->user_password;
    }
    public function roles()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
    public function detail()
    {
        return $this->hasOne(UserDetail::class);
    }
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($user) {
            $user->detail()->delete(); // Xóa detail user khi xóa user
        });
    }
}
