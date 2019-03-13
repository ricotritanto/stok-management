<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\CategoryRepository;
use App\Repository\BrandRepository;
use App\Repository\ProductRepository;
use App\Repository\PurchaseRepository;
use App\Repository\SuplierRepository;

class PurchaseController extends Controller
{
    public function index()
    {
    	   // $purchaserepo= new PurchaseRepository();
    	   // $purchase= $purchaserepo->getdata();
        $suplierrepo =  new SuplierRepository();
        $suplier = $suplierrepo->getsuplier();

        $purchaserepo =  new PurchaseRepository();
        $code = $purchaserepo->getfacture();
        return view('purchase.index', compact('code','suplier'));
    }

    public function getproduct(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|string|max:10'
        ]);

        $productrepo = new ProductRepository;
        $product = $productrepo->getprocod($request);
        // print_r($product);exit();
        return view('purchas.detail', compact('product'));
    }
}
