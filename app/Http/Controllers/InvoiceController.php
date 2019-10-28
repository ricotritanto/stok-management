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
    	 // return view('invoice.index');
    	$facture = ['FS-00001/09/2019'];
    	$issuingrepo =  new IssuingRepository();
        $datane = $issuingrepo->getnota($facture);

        $customerrepo =  new CustomerRepository();
        $customer = $customerrepo->getcustomer();
        // print_r($nota);exit();

    	$header = ['StarCCTV'];
    	
        $pdf = PDF::loadview('invoice.index',compact('header','datane','customer'));
        return $pdf->download('laporan-issuing-pdf');
    }
}
