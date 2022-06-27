<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Childcategory;
use App\Models\Brand;
use App\Models\Warehouse;
use App\Models\Pickuppoint;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [ 'category_id','color','size','pickup_point_id',
    'subcategory_id',	'childcategory_id',	'brand_id',	'pickup_point_id',	'name',	'code',	'unit',	'tags',	'color'	,'size'	,'video',
    	'purchase_price',	'selling_price',	'discount_price',	'stock_quantity',	'warehouse',	'description',	'thumbnail',
    	'images',	'featured'	,'today_deal'	,'publish'	,'status',	'flash_deal_id',	'cash_on_delivery',	'admin_id',
    		'created_at' ,	'updated_at'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function subcategory(){
        return $this->belongsTo(Subcategory::class,'subcategory_id');
    }
    public function Childcategory(){
        return $this->belongsTo(Childcategory::class,'childcategory_id');
    }
    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id');
    }
    public function pickuppoint(){
        return $this->belongsTo(Pickuppoint::class,'pickup_point_id');
    }
    public function warehouse(){
        return $this->belongsTo(Warehouse::class,'warehouse');
    }


}
