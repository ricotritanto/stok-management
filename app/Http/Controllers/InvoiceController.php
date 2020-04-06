<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\CategoryRepository;
use App\Repository\BrandRepository;
use App\Repository\ProductRepository;
use App\Repository\IssuingRepository;
use App\Repository\PurchaseRepository;
use App\Repository\CustomerRepository;
use PDF;


class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
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
        
        $pdf = PDF::loadview('invoice.invis',compact('header','datane','customer'));
        return $pdf->stream('report-invoice-issuing-pdf');

    }

    public function download($issuing_facture)
    {
        $issuingrepo =  new IssuingRepository();
        $datane = $issuingrepo->getbyid($issuing_facture);
        
        $customerrepo =  new CustomerRepository();
        $customer = $customerrepo->getcustomer();

        $header = ['StarCCTV'];
        
        $pdf = PDF::loadview('invoice.invis',compact('header','datane','customer'));
        return $pdf->download('report-invoice-issuing-pdf');
    }

    public function report_purchase()
    {
        return view('invoice.report_purchase');
    }

    public function purchase(Request $request)
    {
        $facture =$request->facture;
        $suplier =$request->suplier;
        $tgl1 =$request->date1;
        $tgl2 =$request->date2;

        $purchaserepo =  new PurchaseRepository();
        $datane = $purchaserepo->getinvoice($facture, $suplier, $tgl1, $tgl2);
        
        if(count($datane) > 0)
        {

            return view('invoice.report_purchase', compact('datane'));
        }
        else 
        {
            return view ('invoice.report_purchase')->withMessage('No Details found. Try to search again !');
        }
    }

    public function inchase($purchase_facture)
    {
        $purchaserepo =  new PurchaseRepository();
        $datane = $purchaserepo->getbyid($purchase_facture);
        // print_r($datane);exit();
        return view('invoice.inchase', compact('datane'));
    }

    public function print_purchase($purchase_facture)
    {
        $purchaserepo =  new PurchaseRepository();
        $datane = $purchaserepo->getbyid($purchase_facture);
        

        $header = ['StarCCTV'];
        
        $pdf = PDF::loadview('invoice.inchase',compact('header','datane'));
        return $pdf->stream('report-invoice-issuing-pdf');
    }
}
