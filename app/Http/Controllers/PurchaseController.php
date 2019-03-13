<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\CategoryRepository;
use App\Repository\BrandRepository;
use App\Repository\ProductRepository;
use App\Repository\PurchaseRepository;

class PurchaseController extends Controller
{
    public function index()
    {
    	   // $purchaserepo= new PurchaseRepository();
    	   // $purchase= $purchaserepo->getdata();
    	return view('purchase.index');
    }
}
