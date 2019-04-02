<?php
namespace App\Repository;

// use Illuminate\Support\Facades\DB;
use App\Model\Category;
use App\Model\Brand;
use App\Model\Products;
use App\Model\Suplier;
use App\Model\Purchase;
use App\Model\Purchase_detail;


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

    public function insertpurchasedetail($data,$facture,$date,$suplier)
    {
        $purchase=$this->insertpurchase($facture,$date,$suplier);
        // // $purchase_id = $this->insertpurchase($facture);
        // print_r($purchase);exit();
        for($i=0;$i<count($data);$i++)
        {
            $data[$i]['purchase_id']=$purchase;
  			$data[$i]['product_id']=$data[$i]['product_id'];
            $data[$i]['created_at'] =date('Y-m-d H:i:s');
            $data[$i]['updated_at'] = date('Y-m-d H:i:s');
  			unset($data[$i]['id']);
        }
        return purchase_detail::insert($data);		
    }

     public function insertpurchase($facture,$date,$suplier)
    //  public function insertpurchase($facture)
     {
        $data = [
            'purchase_facture'=>$facture,
            'date' =>$date,
            'suplier' =>$suplier,
            'created_at' =>date('Y-m-d H:i:s'),
            'updated_at' =>date('Y-m-d H:i:s'),
    	];
    	$id = purchase::create($data);
    	return $id;
       
        // // print_r($data);exit();
        
        //  print_r($id);exit();
        // print_r($date);exit();
        //  $id= purchase::create(['purchase_facture'=>$facture,
        //  'date' =>$date,
        //  'suplier' =>$suplier,]);
       
        
     }
}