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
           
            $aa['product_id']=$key['product_id'];
            $aa['qty']=$key['qty'];
            $aa['total']=$key['total'];
            $aa['created_at'] =date('Y-m-d H:i:s');
            $aa['updated_at'] = date('Y-m-d H:i:s');
        }
        
        $id= issuing_detail::insertGetId($aa);	
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
            // $bb[$i]['issuing_id']=$id;
            $bb[$i]['issuing_details_id'] = $id;
            $bb[$i]['issuing_facture'] = $data[$i]['issuing_facture'];
            $bb[$i]['date'] = $data[$i]['date'];
            $bb[$i]['customer_id'] = $data[$i]['customer_id'];
            $bb[$i]['grandtotal'] = $data[$i]['grandtotal'];
            $bb[$i]['bayar'] = $data[$i]['bayar'];
            $bb[$i]['kembali'] = $data[$i]['kembali'];
            $bb[$i]['created_at'] = date('Y-m-d H:i:s');
            $bb[$i]['updated_at'] = date('Y-m-d H:i:s');
  			unset($bb[$i]['id']);
  		}
        return issuing::insert($bb);
     }

     function getnota($facture)
     {
        return issuing::Where('issuing_facture',$facture)->with('customer')
        ->join('customers','issuings.customer_id','=','customers.id')
        ->join('issuing_details','issuings.issuing_details_id','=','issuing_details.id')
        ->join('products','issuing_details.product_id','=','products.id')
        ->join('brands','products.brand_id','=','brands.id')->get();
        // return products::with('brand')->with('category')->orderBy('created_at', 'Desc')->get();
        // $workers = Worker::with('result')->find($id);
        // return issuing::with('customers')->Where('issuing_facture', $facture)->first();
     }
}