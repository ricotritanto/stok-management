<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\issuing_detail;
use App\issuing;
use App\customer;

class Issuing extends Model
{
    protected $fillable = ['id','date','customer_id','grandtotal','created_at','updated_at'];
    protected $table = 'issuings';

    public function issuing_detail()
    {
        return $this->belongsTo(issuing::class, 'issuing_id', 'id');
    }

    public function customer()
    {
    	return $this->hasMany(customer::class, 'id','customer_id');
    }
}
