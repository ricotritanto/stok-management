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
        // return response()->json($product);
        // echo json_encode($product);
        // print_r($product);exit();
        return view('purchase.detail', compact('product'));
    }

    public function add(Request $request)
    {
        $a = $request->all();
        $data = $a['facture'];
        $data = $a['code'];
        $data = $a['proname'];
        $data = $a['qty'];
        $data = $a['datepicker'];
        $data = $a['suplier'];

        return view('purchase.index', compact('data'));
    }
}
