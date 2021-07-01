<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use App\Repository\IssuingRepository;
use App\Repository\PurchaseRepository;
use App\Repository\CustomerRepository;
use App\Issuing;
use App\Issuing_detail;
use App\product;
use App\customer;
use App\Purchase;
use DB;
use PDF;
use Auth;


class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $role = Auth::user()->level;
         return view('invoice.index',compact('role'));
    }

    public function issuing(Request $request)
    {
        $role = Auth::user()->level;
        $facture =$request->facture;
        $customer =$request->customer;
        $tgl1 =$request->date1;
        $tgl2 =$request->date2;

        $issuingrepo =  new IssuingRepository();
        $datane = $issuingrepo->getinvoice($facture, $customer, $tgl1, $tgl2);
        if(count($datane) > 0)
        {

            return view('invoice.index', compact('datane','role'));
        }
        else
        {
            return view ('invoice.index', compact('role'))->withMessage('No Details found. Try to search again !');
        }

    }

    public function invis($issuing_facture)
    {
        $role = Auth::user()->level;
        $issuingrepo =  new IssuingRepository();
        $datane = $issuingrepo->getbyid($issuing_facture);

        return view('invoice.invis', compact('datane','role'));

    }

    public function print_invis($issuing_facture)
    {
        $role = Auth::user()->level;
        $issuingrepo =  new IssuingRepository();
        $datane = $issuingrepo->getbyid($issuing_facture);

        $customerrepo =  new CustomerRepository();
        $customer = $customerrepo->getcustomer();

        $header = ['StarCCTV'];

        $pdf = PDF::loadview('invoice.invis',compact('header','datane','customer','role'));
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
        $role = Auth::user()->level;
        return view('invoice.report_purchase',compact('role'));
    }

    public function purchase(Request $request)
    {
        $role = Auth::user()->level;
        $facture =$request->facture;
        $suplier =$request->suplier;
        $tgl1 =$request->date1;
        $tgl2 =$request->date2;

        $purchaserepo =  new PurchaseRepository();
        $datane = $purchaserepo->getinvoice($facture, $suplier, $tgl1, $tgl2);
        if(count($datane) > 0)
        {

            return view('invoice.report_purchase', compact('datane','role'));
        }
        else
        {
            return view ('invoice.report_purchase', compact('role'))->withMessage('No Details found. Try to search again !');
        }
    }

    public function inchase($purchase_facture)
    {
        $role = Auth::user()->level;
        $purchaserepo =  new PurchaseRepository();
        $datane = $purchaserepo->getbyid($purchase_facture);
        return view('invoice.inchase', compact('datane','role'));
    }

    public function print_purchase($purchase_facture)
    {
        $purchaserepo =  new PurchaseRepository();
        $datane = $purchaserepo->getbyid($purchase_facture);


        $header = ['StarCCTV'];

        $pdf = PDF::loadview('invoice.inchase',compact('header','datane','role'));
        return $pdf->stream('report-invoice-issuing-pdf');
    }
}
