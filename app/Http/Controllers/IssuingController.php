<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\CategoryRepository;
use App\Repository\BrandRepository;
use App\Repository\ProductRepository;
use App\Repository\IssuingRepository;
use App\Repository\CustomerRepository;
use PDF;

class IssuingController extends Controller
{
    public function index()
    {
        $customerrepo =  new CustomerRepository();
        $customer = $customerrepo->getcustomer();

        $customerrepo =  new CustomerRepository();
        $cscode = $customerrepo->getcode();

        $issuingrepo =  new IssuingRepository();
        $code = $issuingrepo->getfacture();
        return view('issuing.index', compact('code','customer','cscode'));
    }

    public function getproduct(Request $request)
    {
        $this->validate($request, [
            'code' => 'required',
        ]);
        
        try{
            $productrepo = new ProductRepository;
            $product = $productrepo->getprocod($request);
            if (empty($product['product_kode']))
            {
                echo '<script language="javascript">';
                echo 'alert("Barang Tidak Ada.")';
                echo '</script>';
            }
               else if($product['stocks']<=0 )
               {
                   echo '<script language="javascript">';
                   echo 'alert("Out Of Stock!")';
                   echo '</script>';
               }

            else
            {
                return view('issuing.detail', compact('product'));
            }
        }catch(\Exception $e)
        {
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }

    public function store(Request $request)
    {  
       
        $a = $request->all();

        $facture = $a['facture'];
        $date = $a['date'];
        $customer = $a['customer'];
        $grandtot = $a['grandtot'];
        $idpro = $a['product'];      
        $qty = $a['qty'];
        $total = $a['total'];
        $bayar = $a['bayar'];
        $kembali = $a['kembali'];
<<<<<<< HEAD
       
=======
        // return Redirect('invoice', compact('facture'));
>>>>>>> 27c166c975038a6bcf09ee8073d4549f1d3982de
        $data =array();

        $index=0;
        foreach ($idpro as $key ) 
        {
            array_push($data, array(
                        'issuing_facture'=>$facture,
                        'customer_id'=>$customer,
                        'date'=>$date,
                        'grandtotal'=>$grandtot,
                        'bayar'=>$bayar,
                        'kembali'=>$kembali,
                        'product_id'=>$idpro[$index],
                        'qty'=>$qty[$index],  // Ambil dan set data nama sesuai index array dari $index
                        'total'=>$total[$index],
                      ));
                $index++;
        }
<<<<<<< HEAD
        try
        {
            $issuingrepo = new IssuingRepository;
            $issuing = $issuingrepo->issuing($data);
        //      return redirect()->route('generatepdf', compact('issuing'));
        // exit();
            // $b = $data; print_r($b);exit();
            $facture = $a['facture'];
            // print_r($facture);exit();    
            $issuingrepo =  new IssuingRepository();
            $datane = $issuingrepo->getnota($facture);
            print_r($datane);exit();
=======

        $issuingrepo = new IssuingRepository;
        $issuing = $issuingrepo->issuing($data);

        $facture = $a['facture'];
        $issuingrepo =  new IssuingRepository();
        $datane = $issuingrepo->getnota($facture);
>>>>>>> 27c166c975038a6bcf09ee8073d4549f1d3982de

            $header = ['StarCCTV'];
            
            $pdf = PDF::loadview('issuing.pdf',compact('header','datane','customer'));
            return $pdf->download('laporan-issuing-pdf');
<<<<<<< HEAD
          
            // return redirect('issuing')->with(['success' => 'Save Success']);
=======
            return redirect('issuing')->with(['success' => 'Save Success']);
        //  return response()->json([
        //     'error' => false,
        //     'datane'  => $datane,
        // ], 200);


        // try
        // {
        //     $issuingrepo = new IssuingRepository;
        //     $issuing = $issuingrepo->issuing($data);
            
            
        //     $facture = $a['facture'];
        //     $issuingrepo =  new IssuingRepository();
        //     $datane = $issuingrepo->getnota($facture);

        //     $customerrepo =  new CustomerRepository();
        //     $customer = $customerrepo->getcustomer();

        //     $header = ['StarCCTV'];
        //     // return redirect('issuing')->with(['success' => 'Save Success']);
        //     $pdf = PDF::loadview('issuing.pdf',compact('header','datane','customer'));
        //     return $pdf->stream('laporan-issuing-pdf');

>>>>>>> 27c166c975038a6bcf09ee8073d4549f1d3982de

           
        // }catch(\Exception $e)
        // {
        //     return redirect()->back()->with(['error'=>$e->getMessage()]);
        // }

        
    }

    public function generatepdf()
    {
        $a = $issuing->all();
        $facture = $a['facture'];
        $issuingrepo =  new IssuingRepository();
        $datane = $issuingrepo->getnota($facture);

        // return response()->json([
        //         'error' => false,
        //         'datane'  => $datane,
            // ], 200);
        // print_r($datane);exit();

        $customerrepo =  new CustomerRepository();
        $customer = $customerrepo->getcustomer();

        $header = ['StarCCTV'];
        
        $pdf = PDF::loadview('issuing.pdf',compact('header','datane','customer'));
        return $pdf->download('laporan-issuing-pdf');
    }
}
