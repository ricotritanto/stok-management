<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Products;
use App\Model\category;
use App\Model\brand;
use App\Model\issuing_detail;
use App\Model\issuing;

class Issuing_detail extends Model
{
    protected $guarded = [];
    protected $table = 'issuing_details';

    public function product()
    { 
    	return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function issuing()
    {
        return $this->belongsTo(issuing::class, 'issuing_details_id', 'id');
    }
}
