<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
	protected $guarded = [];
	
    public function category()
    { 
    	return $this->belongsTo(category::class);
    }

    public function brand()
    {
    	return $this->belongsTo(brand::class);
    }
}
