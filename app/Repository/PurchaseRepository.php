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
        $fak = (int) substr($cek, 6);
        $day = date('d');
        $bulan = date('m');
        $tahun = date('Y'); 
        $kd ="PF";
        $no = 1;
        if($fak)
        {
            $sum = $fak +1;
            $a = $kd."-".$day."".$bulan."".$tahun."-".sprintf("%05d",$sum);
        }else{
            $a = $kd."-".$day."".$bulan."".$tahun."-".sprintf("%05d",$no);
        }      
        return $a;
    }

     public function purchase($data)
     {
       
        // foreach ($data as $key) 
        // {
        //     // $aa['purchase_id']=$id;
        //     $aa['product_id']=$key['product_id'];
        //     $aa['qty']=$key['qty'];
        //     $aa['total']=$key['total'];
        //     $aa['created_at'] =date('Y-m-d H:i:s');
        //     $aa['updated_at'] = date('Y-m-d H:i:s');

            
        // }
        // // print_r($aa);exit();
        // // $id= purchase_detail::insertGetId($aa);	
        // $as = $data('purchase_id'=$id,
        //             'product_id' => $product_id,
        //             'qty' => $qty, 
        //             'total' => $total,
        //             'created_at' => date('Y-m-d H:i:s'),
        //             'updated_at' => date('Y-m-d H:i:s')); 

        // print_r($as); exit();
        for($i=0;$i<count($data);$i++)
      {
            $bb[$i]['purchase_detail_id']=$id;
            $bb[$i]['purchase_facture'] = $data[$i]['purchase_facture'];
            $bb[$i]['date'] = $data[$i]['date'];
            $bb[$i]['suplier_id'] = $data[$i]['suplier'];
            $bb[$i]['grandtotal'] = $data[$i]['grandtotal'];
            $bb[$i]['created_at'] = date('Y-m-d H:i:s');
            $bb[$i]['updated_at'] = date('Y-m-d H:i:s');

           
  			unset($bb[$i]['id']);
  		}
    	
        // print_r($bb);exit();
        return purchase_detail::insert($bb);
     }

     public function purchase_details($data)
     {

        // $data = [
        //     'product_id'=>$status,
        //     'qty'=>$this->generateRandomString(15),
        //     'total'=>,
        //     'created_at' =>date('Y-m-d H:i:s'),
        //     'updated_at' =>date('Y-m-d H:i:s'),
        // ];
        foreach ($data as $key) 
        {
            // $aa['purchase_id']=$id;
            $aa['purchase_facture']=$key['product_id'];
            $aa['date']=$key['date'];
            $aa['suplier_id']=$key['suplier'];
            $aa['grandtotal'] =$key['grandtotal'];
            $aa['created_at'] =date('Y-m-d H:i:s');
            $aa['updated_at'] = date('Y-m-d H:i:s');

            
        }
        $id = purchase::insertGetId($aa);
        return $id;

     }

     function getnota($facture)
     {
        return purchase::Where('purchase_facture',$facture)->with('suplier')
        ->join('supliers','purchase.suplier_id','=','supliers.id')
        ->join('purchase_detail','purchase.purchase_detail_id','=','purchase_detail.id')
        ->join('products','purchase_detail.product_id','=','products.id')
        ->join('brands','products.brand_id','=','brands.id')->get();
        // return products::with('brand')->with('category')->orderBy('created_at', 'Desc')->get();
        // $workers = Worker::with('result')->find($id);
        // return issuing::with('customers')->Where('issuing_facture', $facture)->first();
     }
}