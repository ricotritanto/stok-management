<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = [];
    protected $table = 'customers';

    public function issuing()
    {
    	return $this->hasOne(issuings::class, 'id','customer_id');
    }
}
