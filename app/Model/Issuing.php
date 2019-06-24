<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\issuing_detail;
use App\Model\issuing;
use App\Model\customer;


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
