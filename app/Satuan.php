<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\satuan;

class Satuan extends Model
{
    //
    protected $guarded = [];
    protected $table = 'satuan';

    public function satuan()
    {
    	return $this->hasMany(satuan::class, 'id','name');
    }
}
