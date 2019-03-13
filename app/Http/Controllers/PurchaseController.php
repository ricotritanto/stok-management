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
}
