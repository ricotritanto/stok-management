<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Products;
use App\category;
use App\brand;
use App\issuing_detail;
use App\issuing;

class Issuing_detail extends Model
{
    protected $guarded = [];
    protected $table = 'issuing_details';

    public function product()
    { 
    	// return $this->belongsTo(Product::class, 'product_id', 'id');
        return $this->belongsTo('App\Product');
    }

     public function issuing()
    {
        return $this->belongsTo(issuing::class, 'issuing_details_id', 'id');
    }
}
