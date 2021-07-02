<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\CategoryRepository;
use App\Repository\BrandRepository;
use App\Repository\ProductRepository;
use App\Repository\IssuingRepository;
use App\Repository\CustomerRepository;
use PDF;
use Auth;

class IssuingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $role = Auth::user()->level;
        $customerrepo =  new CustomerRepository();
        $customer = $customerrepo->getcustomer();

        $customerrepo =  new CustomerRepository();
        $cscode = $customerrepo->getcode();

        $issuingrepo =  new IssuingRepository();
        $code = $issuingrepo->getfacture();

        //untuk forelse di nota
        $facture ='';
        $issuingrepo =  new IssuingRepository();
        $datane = $issuingrepo->getnota($facture);

        return view('issuing.index', compact('code','customer','cscode','datane','role'));
    }

    public function getproduct(Request $request)
    {
        $this->validate($request, [
            'code' => 'required',
        ]);

        try{
            $productrepo = new ProductRepository;
            $product = $productrepo->getprocod($request->code);
            if (empty($product['code']))
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



        try
        {
            $issuingrepo = new IssuingRepository;
            $issuing = $issuingrepo->issuing($data);


            $issuingrepo =  new IssuingRepository();
            $datane = $issuingrepo->getnota($facture);
            foreach ($datane as $key )
            {
                $a = $key['issuing_facture'];
                $b = $key['grandtotal'];
                $c = $key['bayar'];
                $d = $key['kembali'];
            }

            return redirect(route('issuing.index'))->with(['modal_message' => 'Save Success',
                                                'facture' => $a,
                                                'grandtot' => $b,
                                                'bayar' => $c,
                                                'kembali' => $d]);

        }catch(\Exception $e)
        {
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }


    }

    public function generatepdf(Request $request)
    {
        $role = Auth::user()->level;
        $a = $request->all();
        $facture = $a['facture'];
        $issuingrepo =  new IssuingRepository();
        $datane = $issuingrepo->getnota($facture);
        
        $customerrepo =  new CustomerRepository();
        $customer = $customerrepo->getcustomer();
        if($datane->isEmpty()){
            echo '<script language="javascript">';
            echo 'alert("Nota Tidak Ada.")'; 
            echo '</script>';
            return view('issuing.print_nota',compact('role'));
        }else{
            $header = ['StarCCTV'];
            $pdf = PDF::loadview('issuing.pdf',compact('header','datane','customer','role'));
            return $pdf->download($facture.".pdf");  
        }
    }

    public function printnota()
    {
        $role = Auth::user()->level;
        return view('issuing.print_nota',compact('role'));
    }
}
