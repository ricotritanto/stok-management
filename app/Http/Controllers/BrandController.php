<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\BrandRepository;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
    	$brandrepo=new BrandRepository;
	    $brand = $brandrepo->Getbrand();
	    return view('brand.index', compact('brand'));
    }

    public function store(Request $Request)
    {
    	$request= $Request['brand'];
    	$brandrepo =new BrandRepository;
        $brand = $brandrepo->create_brand($request)->paginate(5);
         return response()->json([
            'success' => false,
            'brand'  => $brand,
        ], 200);
    }

    public function destroy($id)
    {
    	$brandrepo =new BrandRepository;
       	$brand = $brandrepo->delete($id);
       	return response()->json([
            'success' => false,
            'brand'  => $brand,
        ], 200);
    }

    public function show($id)
    {
    	$brandrepo =new BrandRepository;
       	$brand = $brandrepo->getid($id);
        return response()->json([
            'success' => false,
            'brand'  => $brand,
        ], 200);
    }

    public function update(Request $Request, $id)
    {
    	$request= $Request['brand'];
    	$brandrepo =new BrandRepository;
        $brand = $brandrepo->update_brand($request, $id);
         return response()->json([
            'success' => false,
            'brand'  => $brand,
        ], 200);	
    }
}
