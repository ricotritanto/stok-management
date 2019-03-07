<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Products;
use App\Model\category;
use App\Model\brand;

class Products extends Model
{
    protected $fillable = ['product_id','stocks','description','product_code'];
    protected $table = 'product';
	
    public function category()
    { 
    	return $this->hasOne(category::class, 'id','category_id');
    }

    public function brand()
    {
    	return $this->hasOne(brand::class, 'id','brand_id');
    }
}
