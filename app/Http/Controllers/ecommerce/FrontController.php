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
        $product = Product::with(['category'])->orderBy('created_at', 'DESC');
        if(request()->q != '') {
            $products = $product->where('name', 'like', '%'. request()->q.'%');
        }
        $products = $product->paginate(10);
        $products1 = Product::OrderBy('created_at','ASC')->paginate(12);
    
        return view('ecommerce.product', compact('products', 'products1'));
    }

    public function CategoryProduct($slug)
    {
        $products1 = Product::OrderBy('created_at','ASC')->paginate(12);
        $products = Category::where('slug', $slug)->first()->product()->orderBy('created_at','DESC')->paginate(12);
        return view('ecommerce.product', compact('products', 'products1'));
    }

    public function show($slug)
    {
        $products1 = Product::OrderBy('created_at','ASC')->paginate(12);
        $products = Product::with(['category'])->where('slug', $slug)->first();
        return view('ecommerce.show', compact('products', 'products1'));
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
