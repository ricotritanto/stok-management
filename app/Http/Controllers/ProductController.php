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
        // $productrepo=new ProductRepository;
        // $code = $productrepo->GenerateCode();
    	return view('product.create', compact('category','brand'));

    }

    public function store(Request $Request)
    {
        $this->validate($Request, [
            'name'  => 'required|max:100',
            'brand_id' => 'required|integer',
            'category_id' => 'required|integer',
            'pprice' => 'required',
            'sprice'=> 'required',
            'stock' => 'required|max:30',
            'description' => 'nullable|string|max:255',
            'code' => 'required|string|max:11',
            'serial' => 'required|string|max:255',
        ]);
        $pprice=$Request['pprice'];
        $sprice=$Request['sprice'];
        // konversi dari bilangan rupiah ke bilangan biasa
        $price = str_replace(".", "", $pprice);
        $sell = str_replace(".", "", $sprice);
        $name = $Request['name'];
        $code = $Request['code'];
        $serial = $Request['serial'];
        $brand = $Request['brand_id'];
        $category = $Request['category_id'];
        $description = $Request['description'];
        $stock = $Request['stock'];
        try{
            $productrepo =new ProductRepository;
            $product = $productrepo->create_product($name,$code,$serial,$brand,$category,$description,$stock,$price,$sell,$serial);
             return redirect(route('product.index'))->with(['success' => '<strong>' . $name . '</strong> added successfully']);
        }catch(\Exception $e)
        {
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        $productrepo =new ProductRepository;
        $product = $productrepo->delete($id);
        return redirect()->back()->with(['success'=>'<strong>'.''.'</strong> Delete Success']);
    }

    public function edit($id)
    {
        $productrepo =new ProductRepository;
        $product = $productrepo->getproductid($id);

        $brandrepo=new BrandRepository;
        $brand = $brandrepo->Getbrand();

        $categoryrepo=new CategoryRepository;
        $category = $categoryrepo->GetCategory();
        
        return view('product.edit', compact('product','brand','category'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'  => 'required|max:100',
            'brand_id' => 'required|integer',
            'category_id' => 'required|integer',
            'pprice' => 'required',
            'sprice'=> 'required',
            'stock' => 'required|max:30',
            'description' => 'nullable|string|max:255',
            'code' => 'required|string|max:11',
            'serial' => 'required|string|max:255',
        ]);
        // $aa = $Request->all();
        // print_r($aa);exit();
        $pprice=$request['pprice'];
        $sprice=$request['sprice'];
        // konversi dari bilangan rupiah ke bilangan biasa
        $price = str_replace(".", "", $pprice);
        $sell = str_replace(".", "", $sprice);
        $name = $request['name'];
        $code = $request['code'];
        $serial = $request['serial'];
        $brand = $request['brand_id'];
        $category = $request['category_id'];
        $description = $request['description'];
        $stock = $request['stock'];

        try{
            $productrepo =new ProductRepository;
            $product = $productrepo->update_product($id,$name,$code,$serial,$brand,$category,$description,$stock,$price,$sell);
             return redirect(route('product.index'))->with(['success' => '<strong>' . $name . '</strong> Update successfully']);
        }catch(\Exception $e)
        {
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }
}
