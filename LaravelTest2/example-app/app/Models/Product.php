<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable=['product_name', 'product_price', 'product_description', 'product_quantity', 'product_image']; 
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function producer()
    {
        return $this->belongsTo(Producer::class);
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_items')
                    ->withPivot('quantity','price'); 
    }
    use HasFactory;
}
