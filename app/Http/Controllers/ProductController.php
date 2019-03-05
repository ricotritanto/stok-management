<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\CategoryRepository;
use App\Repository\BrandRepository;

class ProductController extends Controller
{
    public function index()
    {
    	return view('product.index');
    }

    public function create()
    {
    	$brandrepo=new BrandRepository;
	    $brand = $brandrepo->Getbrand();
    	$categoryrepo=new CategoryRepository;
	    $category = $categoryrepo->GetCategory();
    	return view('product.create', compact('category','brand'));

    }
}
