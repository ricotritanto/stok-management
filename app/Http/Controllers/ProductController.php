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
        $productrepo =new ProductRepository;
        $product = $productrepo->getProduct();
        // print_r($product);exit();
        return view('product.index', compact('product'));
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
            'name'  => 'required|max:100',
            'brand_id' => 'required|integer',
            'category_id' => 'required|integer',
            'stock' => 'required|max:30',
            'description' => 'nullable|string|max:255',
            'code' => 'required|string|max:11',
        ]);        
        $name = $Request['name'];
        $code = $Request['code'];
        $brand = $Request['brand_id'];
        $category = $Request['category_id'];
        $description = $Request['description'];
        $stock = $Request['stock'];
        // print_r($datane);exit();
        try{
            $productrepo =new ProductRepository;
            $product = $productrepo->create_product($name,$code,$brand,$category,$description,$stock);
             return redirect(route('product.index'))->with(['success' => '<strong>' . $product->name . '</strong> Ditambahkan']);
        }catch(\Exception $e)
        {
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }

    public function destroy()
    {

    }

    public function edit()
    {
        
    }
}
