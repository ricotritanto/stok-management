<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\customer;
use App\issuing;

class Customer extends Model
{
    protected $guarded = [];
    protected $table = 'customers';

    public function issuing()
    {
    	return $this->hasMany(issuing::class, 'id','customer_id');
    }
}
