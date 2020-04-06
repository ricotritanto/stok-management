<?php
namespace App\Repository;

// use Illuminate\Support\Facades\DB;
use App\Category;
use App\Products;
use App\Suplier;
use App\Purchase;
use App\Purchase_detail;


class PurchaseRepository{

    Public function getfacture()
    {
        $cek =  purchase_detail::max('purchase_facture');
        $fak = (int) substr($cek, 12);
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

        $transId=$this->purchase_details($data);
        for($i=0;$i<count($data);$i++)
        {
            $bb[$i]['purchase_facture']=$data[$i]['purchase_facture'];
            $bb[$i]['purchase_id']=$transId;
            $bb[$i]['product_id'] = $data[$i]['product_id'];
            $bb[$i]['qty'] = $data[$i]['qty'];
            $bb[$i]['total'] = $data[$i]['total'];
            $bb[$i]['created_at'] = date('Y-m-d H:i:s');
            $bb[$i]['updated_at'] = date('Y-m-d H:i:s');   
  			unset($bb[$i]['id']);
  		}
    	
        // print_r($bb);exit();
        return purchase_detail::insert($bb);
     }

     public function purchase_details($data)
     {
        foreach ($data as $key) 
        {
            // $aa['purchase_id']=$id;          
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
        ->join('purchase_detail','purchase_detail.purchase_id','=','purchase.id')
        ->join('products','purchase_detail.product_id','=','products.id')->get();
        // return products::with('brand')->with('category')->orderBy('created_at', 'Desc')->get();
        // $workers = Worker::with('result')->find($id);
        // return issuing::with('customers')->Where('issuing_facture', $facture)->first();
     }

     function getinvoice($facture, $suplier, $tgl1, $tgl2)
     {
         $abc = purchase::Where('purchase_facture',$facture)->with('suplier')
        ->join('supliers','purchase.suplier_id','=','supliers.id')
        ->join('purchase_detail','purchase_detail.purchase_id','=','purchase.id')
        ->join('products','purchase_detail.product_id','=','products.id')->orWhere('suplier_name','LIKE',"%{$suplier}%")->WhereBetween('date',[$tgl1, $tgl2] )->get();
        return $abc;
     }

     function getbyid($purchase_facture)
     {
        return purchase::Where('purchase_facture',$purchase_facture)->with('suplier')
        ->join('supliers','purchase.suplier_id','=','supliers.id')
        ->join('purchase_detail','purchase_detail.purchase_id','=','purchase.id')
        ->join('products','purchase_detail.product_id','=','products.id')->get();
        // return products::with('brand')->with('category')->orderBy('created_at', 'Desc')->get();
        // $workers = Worker::with('result')->find($id);
        // return issuing::with('customers')->Where('issuing_facture', $facture)->first();
     }
}