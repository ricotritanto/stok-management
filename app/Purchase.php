<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\purchase_detail;
use App\purchase;
use App\suplier;

class Purchase extends Model
{
    // protected $guarded = [];   
    protected $fillable = ['id','date','suplier_id','created_at','updated_at'];
    protected $table = 'purchase';
    
    public function purchase_detail()
    {
        return $this->belongsTo(purchase_detail::class, 'purchase_id', 'id');
    }

    public function suplier()
    {
    	return $this->hasMany(suplier::class, 'id','suplier_id');
    }
}
