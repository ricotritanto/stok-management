<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\suplier;
use App\Model\purchase;

class Suplier extends Model
{
    protected $guarded = [];   
    protected $table = 'supliers';
    
    public function purchase()
    {
    	return $this->hasOne(purchase::class, 'id','suplier_id');
    }
}
