<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Products;
use App\Model\category;
use App\Model\brand;

class Products extends Model
{
    // protected $fillable = ['id','stocks','description','product_kode','product_name'];
    protected $guarded = [];
    protected $table = 'products';
	
    public function category()
    { 
    	return $this->belongsTo(Category::class);
    }

    public function brand()
    {
    	return $this->belongsTo(brand::class);
    }
}
