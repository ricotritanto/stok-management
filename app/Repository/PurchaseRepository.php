<?php
namespace App\Repository;

// use Illuminate\Support\Facades\DB;
use App\Model\Category;
use App\Model\Brand;
use App\Model\Products;
use App\Model\Suplier;
use App\Model\Purchase;

class PurchaseRepository{

	public function getdata()
	{

	}

	public function generatefacture()
	{
		$cek =  purchase::max('purchase_code');
        $data =substr($cek, 4);    
        $kd ="PU";
        $no = 1;
        if($data)
        {
            $sum = $data +1 ;
            $a = $kd.sprintf("%03d",$sum);
        }else{
            $a = $kd.sprintf("%03d",$no);
        }       
        return $a;
	}

	public function generatecode()
	{
		$cek =  purchase::max('purchase_code');
        $data =substr($cek, 4);    
        $kd ="PU";
        $no = 1;
        if($data)
        {
            $sum = $data +1 ;
            $a = $kd.sprintf("%03d",$sum);
        }else{
            $a = $kd.sprintf("%03d",$no);
        }       
        return $a;
	}
}