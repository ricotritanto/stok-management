<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\category;
use App\purchase_detail;
use App\purchase;

class Purchase_detail extends Model
{
    protected $guarded = [];
    protected $table = 'purchase_detail';
    

    public function product()
    { 
    	// return $this->hasMany(Product::class, 'product_id', 'id');
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function purchase()
    {
        return $this->hasMany(purchase::class, 'purchase_id','id');
    }
}
