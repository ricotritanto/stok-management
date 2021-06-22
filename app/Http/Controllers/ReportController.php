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
use App\Category;
use PDF;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        //  return view('invoice.index');
    }

    public function data_barang()
    {
        $product = Product::with(['category','satuan'])->orderBy('created_at', 'DESC');
        $category = Category::orderBy('name','DESC')->get();
        // print_r($product);exit();
        // if(request()->q != '') {
        //     $product = $product->where('name', 'like', '%'. request()->q.'%');
        // }
        $product = $product->paginate(10);
        return view('report.data_barang', compact('product','category'));
    }
}
