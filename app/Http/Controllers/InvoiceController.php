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

    public function invis($issuing_facture)
    {   
        $issuingrepo =  new IssuingRepository();
        $datane = $issuingrepo->getbyid($issuing_facture);

        return view('invoice.invis', compact('datane'));
      
    }

    public function print_invis($issuing_facture)
    {
        $issuingrepo =  new IssuingRepository();
        $datane = $issuingrepo->getbyid($issuing_facture);
        
        $customerrepo =  new CustomerRepository();
        $customer = $customerrepo->getcustomer();

        $header = ['StarCCTV'];
        
        $pdf = PDF::loadview('issuing.pdf',compact('header','datane','customer'));
        return $pdf->stream('laporan-issuing-pdf');

    }

    public function purchase(request $Request)
    {
        
    }
}
