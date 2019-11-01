<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\issuing_detail;
use App\Model\issuing;
use App\Model\customer;


class Issuing extends Model
{
    protected $fillable = ['id','issuing_details_id','issuing_facture','date','customer_id','grandtotal','created_at','updated_at'];
    protected $table = 'issuings';

    public function issuing_detail()
    {
        return $this->belongsTo(issuing::class, 'issuing_details_id', 'id');
    }

    public function customer()
    {
    	return $this->hasMany(customer::class, 'id','customer_id');
    }
}
