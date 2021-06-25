<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\category;
use App\satuan;
use App\purchase_detail;
use App\Issuing_detail;

class Product extends Model
{
    protected $guarded=[];
    public function getStatusLabelAttribute()
    {
        //ADAPUN VALUENYA AKAN MENCETAK HTML BERDASARKAN VALUE DARI FIELD STATUS
        if ($this->status == 0) {
            return '<span class="badge badge-secondary">Draft</span>';
        }
        return '<span class="badge badge-success">Aktif</span>';
    }

    //FUNGSI YANG MENG-HANDLE RELASI KE TABLE CATEGORY
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }

    public function purchase_detail()//relasi dengan tabel product
	 {
		 // jenis relasi one to many, category bisa digunakan oleh banyak product
		 return $this->hasMany(Purchase_detail::class, 'product_id', 'purchase_detail');
     }

     public function issuing_detail()//relasi dengan tabel product
	 {
		 // jenis relasi one to many, category bisa digunakan oleh banyak product
		 return $this->hasMany(Issuing_detail::class, 'satuan_id', 'issuing_detail');
     }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }


}
