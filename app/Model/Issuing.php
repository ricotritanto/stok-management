<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issuing extends Model
{
    protected $guarded = [];
    protected $table = 'issuings';

    public function issuing_detail()
    {
        return $this->belongsTo(issuing_detail::class, 'issuing_id', 'id');
    }

    public function customer()
    {
    	return $this->belongsTo(customers::class, 'customer_id','id');
    }
}
