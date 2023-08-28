<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producer extends Model
{
    protected $table = 'producers';
    protected $fillable=['producer_name']; 
    public function product()
    {
        return $this->hasMany(Product::class);
    }
    use HasFactory;
}
