<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['order_name','order_email','order_address','order_phonenumber','order_status','order_totalprice','order_method','order_note','delivery_time'];
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_items')
                    ->withPivot('quantity','price'); 
    }
    use HasFactory;
}
