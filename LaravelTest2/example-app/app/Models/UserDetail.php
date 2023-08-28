<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $table = 'user_details';
    protected $fillable = ['userdetail_avatar', 'userdetail_birth', 'userdetail_phonenumber','userdetail_address', 'userdetail_fullname'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    use HasFactory;
}
