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
    protected $table = 'issuing_detail';

    public function product()
    { 
    	return $this->belongsTo(Product::class);
    }

    public function issuing()
    {
        return $this->hasMany(issuings::class, 'id','issuing_id');
    }
}
