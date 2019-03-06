<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\CategoryRepository;
use App\Repository\BrandRepository;
use App\Repository\ProductRepository;

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
        $productrepo=new ProductRepository;
        $code = $productrepo->GenerateCode();
    	return view('product.create', compact('category','brand','code'));

    }

    public function store(Request $Request)
    {
        $this->validate($Request, [
            'product_name'  => 'required|max:100',
            'brand_id' => 'required|integer',
            'category_id' => 'required|integer',
            'stocks' => 'required|max:30',
            'description' => 'nullable|string|max:255',
            'product_code' => 'required|string|max:11|unique:product',
        ]);
        try{
            $productrepo =new ProductRepository;
            $product = $productrepo->create_product($Request);
             return redirect(route('product.index'))
            ->with(['success' => '<strong>' . $product->name . '</strong> Ditambahkan']);
        }catch(\Exception $e)
        {
            return redirect()->back()->with(['error'=>$e->getmessage()]);
        }
    }
}
