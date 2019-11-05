<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Products;
use App\Model\category;
use App\Model\brand;
use App\Model\purchase_detail;
use App\Model\purchase;


class Purchase_detail extends Model
{
    protected $guarded = [];
    protected $table = 'purchase_detail';
    

    public function product()
    { 
    	rreturn $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function purchase()
    {
        return $this->hasMany(purchase::class, 'purchase_detail_id','id');
    }
}
