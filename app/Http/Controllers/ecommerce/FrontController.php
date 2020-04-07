<?php

namespace App\Http\Controllers\ecommerce;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Product;


class FrontController extends Controller
{
    public function index()
    {
    	$products = Product::OrderBy('created_at','DESC')->paginate(10);
    	return view('ecommerce.index',compact('products'));
    }

    public function product()
    {

    }

    public function CategoryProduct($slug)
    {

    }

    public function show($slug)
    {

    }

    public function contact()
    {
        return view('ecommerce.contact');
    }

    public function about()
    {
        return view('ecommerce.about');
    }

    public function faq()
    {
        return view('ecommerce.faq');
    }
}
