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
    Public function getfacture()
    {
        $cek =  purchase::max('purchase_facture');
        $data =substr($cek, 6); 
        $bulan = date('m');
        $tahun = date('Y'); 
        $kd ="PF";
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
            $a = $kd.sprintf("%05d",$sum)."/".$bulan."/".$tahun;
        }else{
            $a = $kd.sprintf("%05d",$no)."/".$bulan."/".$tahun;
        }      
        return $a;
    }
}