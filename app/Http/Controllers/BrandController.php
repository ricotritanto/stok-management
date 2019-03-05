<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\BrandRepository;

class BrandController extends Controller
{
    public function index()
    {
    	$brandrepo=new BrandRepository;
	    $brand = $brandrepo->Getbrand();
	    return view('brand.index', compact('brand'));
    }

    public function store(Request $Request)
    {
    	$request= $Request['name'];
    	try{
    		$brandrepo =new BrandRepository;
        	$brand = $brandrepo->create_brand($request)->paginate(5);
        	return redirect()->back()->with(['success'=>'Insert success']);
    	}catch(\Exception $e)
    	{
    		return redirect()->back()->with(['error'=>$e->getmessage()]);
    	}	
    }

    public function destroy($id)
    {
    	$brandrepo =new BrandRepository;
       	$brand = $brandrepo->delete($id);
       	return redirect()->back()->with(['success' => 'Delete success']);
    }

    public function edit($id)
    {
    	$brandrepo =new BrandRepository;
       	$brand = $brandrepo->getid($id);
       	return view('brand.edit', compact('brand'));
    }

    public function update(Request $Request, $id)
    {
    	$request= $Request['name'];
    	try{
    		$brandrepo =new BrandRepository;
        	$brand = $brandrepo->update_brand($request, $id);
        	return redirect(route('brand.index'))->with(['success' => 'Update Success']);
    	}catch(\Exception $e)
    	{
    		return redirect()->back()->with(['error'=>$e->getmessage()]);
    	}	
    }
}
