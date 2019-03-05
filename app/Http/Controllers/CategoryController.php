<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\CategoryRepository;

class CategoryController extends Controller
{
    public function index()
    {
    	$categoryrepo=new CategoryRepository;
	    $category = $categoryrepo->GetCategory();
	    return view('category.index', compact('category'));
    }

    public function store(Request $Request)
    {
    	$q = $Request->all();
        $Request = $q['name'];
    	try{
    		$categoryrepo =new CategoryRepository;
        	$category = $categoryrepo->create_category($Request)->paginate(5);
        	return redirect()->back()->with(['success' => 'category: ' . 'berhasil' . ' Ditambahkan']);
    	}
       	catch (\Exception $e) 
	    {
	        return redirect()->back()->with(['error' => $e->getMessage()]);
	    }
    }

    public function destroy($id)
    {
    	$categoryrepo =new CategoryRepository;
        $category = $categoryrepo->delete($id);
        return redirect()->back()->with(['success' => 'category: ' . 'berhasil' . ' Telah Dihapus']);
    }

    public function edit($id)
    {
    	$categoryrepo =new CategoryRepository;
        $category = $categoryrepo->getidcat($id);
        return view('category.edit', compact('category'));
    }

    public function update(Request $Request, $id)
    {
    	$q = $Request->all();
        $Request = $q['name'];
    	try{
    		$categoryrepo =new CategoryRepository;
        	$category = $categoryrepo->update_category($Request, $id);
        	return redirect(route('category.index'))->with(['success' => 'category: ' . 'berhasil' . ' diupdate']);
    	}
       	catch (\Exception $e) 
	    {
	        return redirect()->back()->with(['error' => $e->getMessage()]);
	    }
    }
}
