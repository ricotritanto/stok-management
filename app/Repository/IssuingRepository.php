<?php
namespace App\Repository;

// use Illuminate\Support\Facades\DB;
use App\Model\Category;
use App\Model\Brand;
use App\Model\Products;
use App\Model\Customer;
use App\Model\issuing;
use App\Model\issuing_detail;


class IssuingRepository{

    Public function getfacture()
    {
        $cek =  issuing::max('issuing_facture');
        $fak = (int) substr($cek, 6);
        $bulan = date('m');
        $tahun = date('Y'); 
        $kd ="FS-";
        $no = 1;
        if($fak)
        {
            $sum = $fak +1;
            $a = $kd.sprintf("%05d",$sum)."/".$bulan."/".$tahun;
        }else{
            $a = $kd.sprintf("%05d",$no)."/".$bulan."/".$tahun;
        }      
        return $a;
    }

     public function issuing($data)
     {
       
        foreach ($data as $key) 
        {
            $aa['issuing_facture'] = $key['issuing_facture'];
            $aa['date'] = $key['date'];
            $aa['customer_id'] = $key['customer_id'];
            $aa['grandtotal'] = $key['grandtotal'];
            $aa['created_at'] = date('Y-m-d H:i:s');
            $aa['updated_at'] = date('Y-m-d H:i:s');;
        }
        
        $id= issuing::insertGetId($aa);	
        // print_r($id);exit();
        // foreach ($data as $key) 
        // {
        //     $bb['purchase_id'] = $id;
        //     $bb['product_id'] = $key['product_id'];
        //     $bb['qty'] = $key['qty'];
        //     $bb['created_at'] =date('Y-m-d H:i:s');
        //     $bb['updated_at'] =date('Y-m-d H:i:s');

        // }
        for($i=0;$i<count($data);$i++)
      {
            $bb[$i]['issuing_id']=$id;
            $bb[$i]['product_id']=$data[$i]['product_id'];
  			$bb[$i]['qty']=$data[$i]['qty'];
            $bb[$i]['total']=$data[$i]['total'];
            $bb[$i]['created_at'] =date('Y-m-d H:i:s');
            $bb[$i]['updated_at'] = date('Y-m-d H:i:s');
  			unset($bb[$i]['id']);
  		}
    	
        // print_r($bb);exit();
        return issuing_detail::insert($bb);
     }
}