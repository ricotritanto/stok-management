<?php
namespace App\Repository;

// use Illuminate\Support\Facades\DB;
use App\Model\Purchase;

class PurchaseRepository{

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
            $a = $kd.sprintf("%05d",$sum)."/".$bulan."/".$tahun;
        }else{
            $a = $kd.sprintf("%05d",$no)."/".$bulan."/".$tahun;
        }      
        return $a;
    }

}