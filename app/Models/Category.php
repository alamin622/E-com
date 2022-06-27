<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subcategory;
use App\Models\Childcategory;
use App\Models\Product;

class Category extends Model
{
    use HasFactory;
     protected $fillable = ['category_name','category_slug','home_page','icon','image'];

     public function childcategories()
     {
         return $this->hasMany(childcategory::class);
     }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class,'category_id');
    }

}
