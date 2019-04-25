<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\purchase_detail;
use App\Model\purchase;
use App\Model\suplier;

class Purchase extends Model
{
    // protected $guarded = [];   
    protected $fillable = ['id','purchase_facture','date','suplier_id','created_at','updated_at'];
    protected $table = 'purchase';
    
    public function purchase_detail()
    {
        return $this->belongsTo(purchase_detail::class, 'purchase_id', 'id');
    }

    public function suplier()
    {
    	return $this->belongsTo(suplier::class, 'suplier_id','id');
    }
}
