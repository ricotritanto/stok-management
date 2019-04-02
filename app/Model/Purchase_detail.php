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
    	return $this->belongsTo(Product::class);
    }

    public function purchase()
    {
        return $this->hasMany(purchase::class, 'id','purchase_id');
    }
}
