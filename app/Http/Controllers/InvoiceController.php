<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\CategoryRepository;
use App\Repository\BrandRepository;
use App\Repository\ProductRepository;
use App\Repository\IssuingRepository;
use App\Repository\CustomerRepository;
use PDF;


class InvoiceController extends Controller
{
    public function index()
    {
         return view('invoice.index');
    }

    public function issuing(Request $request)
    {
        // $a = $request->all();
        // $facture =$a['facture'];
        $facture =$request->facture;
        $customer =$request->customer;
        $tgl1 =$request->date1;
        $tgl2 =$request->date2;

        $issuingrepo =  new IssuingRepository();
        $datane = $issuingrepo->getinvoice($facture, $customer, $tgl1, $tgl2);
        if(count($datane) > 0)
        {

            return view('invoice.index', compact('datane'));
        }
        else 
        {
            return view ('invoice.index')->withMessage('No Details found. Try to search again !');
        }
        
    }

    public function print($id)
    {   
        $a = $id;
        print_r($a);exit();
        $issuingrepo =  new IssuingRepository();
        $datane = $issuingrepo->getbyid($id);
        print_r($datane);exit();

        foreach ($datane as $key ) 
            {
                $a = $key['issuing_facture'];
                $b = $key['grandtotal'];
                $c = $key['bayar'];
                $d = $key['kembali'];
            }
            
            return redirect('invoice.issuing')->with(['modal_message_error' => 'Save Success',
                                                'facture' => $a,
                                                'grandtot' => $b,
                                                'bayar' => $c,
                                                'kembali' => $d]);
    }

    public function purchase(request $Request)
    {
        
    }
}
