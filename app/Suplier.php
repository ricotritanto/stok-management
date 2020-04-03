<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\suplier;
use App\purchase;

class Suplier extends Model
{
    protected $guarded = [];   
    protected $table = 'supliers';
    
    public function purchase()
    {
    	return $this->hasOne(purchase::class, 'id','suplier_id');
    }
}
