<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
