<?php

namespace App\Models;

use app\Models\Product;
use app\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    use HasFactory;
    protected $fillable = ['review','rating','review_date','review_month','review_year'];
    public function category()
    {
        return $this->belongsTo(Category::class, 'user_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }


}
