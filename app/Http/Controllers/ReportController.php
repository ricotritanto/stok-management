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
use App\Purchase_detail;
use App\product;
use App\customer;
use App\Category;
use PDF;
use Auth;

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

    public function data_barang(Request $request)
    {
        $role = Auth::user()->level;
        $row = Auth::user()->id;
        $product = Product::with(['category','satuan'])->orderBy('created_at', 'DESC');
        $category = Category::orderBy('name','DESC')->get();
        $product = $product->paginate(10);
        return view('report.data_barang', compact('product','category','role','row'));
    }

    public function initem(){
        $role = Auth::user()->level;
        $row = Auth::user()->id;
        $product = Purchase_detail::all();
        return view('report.in_item', compact('product','role','row'));
    }

    public function outitem(){
        $role = Auth::user()->level;
        $row = Auth::user()->id;
        $product = Issuing_detail::all();
        return view('report.out_item', compact('product','role','row'));
    }
}
