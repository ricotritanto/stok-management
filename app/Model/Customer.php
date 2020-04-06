<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\issuing;

class Customer extends Model
{
    protected $guarded = [];
    protected $table = 'customers';

    public function issuing()
    {
    	return $this->hasMany(issuings::class, 'id','customer_id');
    }
}
