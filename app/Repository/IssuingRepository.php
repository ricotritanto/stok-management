<?php
namespace App\Repository;

// use Illuminate\Support\Facades\DB;
use App\Category;
use App\Products;
use App\Customer;
use App\issuing;
use App\issuing_detail;


class IssuingRepository{

    Public function getfacture()
    {
        $cek =  issuing_detail::max('issuing_facture');
        $fak = (int) substr($cek, 12);
        $day = date('d');
        $bulan = date('m');
        $tahun = date('Y'); 
        $kd ="FS-";
        $no = 1;
        if($fak)
        {
            $sum = $fak +1;
            $a = $kd.$day.$bulan."".$tahun."-".sprintf("%05d",$sum);
        }else{
            $a = $kd.$day.$bulan."".$tahun."-".sprintf("%05d",$no);
        }      
        return $a;
    }

     public function issuing($data)
     {
       
        $transId=$this->issuing_details($data);
        for($i=0;$i<count($data);$i++)
        {
            // $bb[$i]['issuing_id']=$id;
            $bb[$i]['issuing_facture']=$data[$i]['issuing_facture'];
            $bb[$i]['issuing_id'] = $transId;
            $bb[$i]['product_id'] = $data[$i]['product_id'];
            $bb[$i]['qty'] = $data[$i]['qty'];
            $bb[$i]['total'] = $data[$i]['total'];
            $bb[$i]['created_at'] = date('Y-m-d H:i:s');
            $bb[$i]['updated_at'] = date('Y-m-d H:i:s');
            unset($bb[$i]['id']);
        }
        return issuing_detail::insert($bb);

     }

    public function issuing_details($data)
    {
     
         foreach ($data as $key) 
        {   
           
            $aa['date']=$key['date'];
            $aa['customer_id']=$key['customer_id'];
            $aa['bayar']=$key['bayar'];
            $aa['kembali']=$key['kembali'];
            $aa['grandtotal']=$key['grandtotal'];
            $aa['created_at'] =date('Y-m-d H:i:s');
            $aa['updated_at'] = date('Y-m-d H:i:s');
        }
        
        $id = issuing::insertGetId($aa);
        return $id;
    }
       
    

     function getnota($facture)
     {
        return issuing::Where('issuing_facture',$facture)->with('customer')
        ->join('customers','issuings.customer_id','=','customers.id')
        ->join('issuing_details','issuing_details.issuing_id','=','issuings.id')
        ->join('products','issuing_details.product_id','=','products.id')->get();
        // return products::with('brand')->with('category')->orderBy('created_at', 'Desc')->get();
        // $workers = Worker::with('result')->find($id);
        // return issuing::with('customers')->Where('issuing_facture', $facture)->first();
     }

     function getinvoice($facture, $customer, $tgl1, $tgl2)
     {
         $abc = issuing::Where('issuing_facture',$facture)->with('customer')
        ->join('customers','issuings.customer_id','=','customers.id')
        ->join('issuing_details','issuing_details.issuing_id','=','issuings.id')
        ->join('products','issuing_details.product_id','=','products.id')->orWhere('customers.name','LIKE',"%{$customer}%")->WhereBetween('date',[$tgl1, $tgl2] )->get();
        return $abc;
     }

     function getbyid($issuing_facture)
     {
        return issuing::Where('issuing_facture',$issuing_facture)->with('customer')
        ->join('customers','issuings.customer_id','=','customers.id')
        ->join('issuing_details','issuing_details.issuing_id','=','issuings.id')
        ->join('products','issuing_details.product_id','=','products.id')->get();
        // return products::with('brand')->with('category')->orderBy('created_at', 'Desc')->get();
        // $workers = Worker::with('result')->find($id);
        // return issuing::with('customers')->Where('issuing_facture', $facture)->first();
     }
}