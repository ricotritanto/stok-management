<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\CategoryRepository;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
    	$categoryrepo=new CategoryRepository;
	    $category = $categoryrepo->GetCategory();
	    return view('category.index', compact('category'));
    }

    public function store(Request $request)
    {
        // $aa = $request['category'];
         $validator = Validator::make($request->input(), array(
            'category' => 'required',
        ));
        if ($validator->fails()) {
            return response()->json([
                'error'    => true,
                'messages' => $validator->errors(),
            ], 422);
        }

    	$categoryrepo =new CategoryRepository;
        $category = $categoryrepo->create_category($request)->paginate(5);
        return response()->json([
            'success' => false,
            'category'  => $category,
        ], 200);
    }

    public function destroy($id)
    {
    	$categoryrepo =new CategoryRepository;
        $category = $categoryrepo->delete($id);
        return response()->json([
            'success' => false,
            'category'  => $category,
        ], 200);
    }

    public function show($id)
    {
    	$categoryrepo =new CategoryRepository;
        $category = $categoryrepo->getidcat($id);
         return response()->json([
            'success' => false,
            'category'  => $category,
        ], 200);
    }

    public function update(Request $Request, $id)
    {
    	$q = $Request->all();
        $Request = $q['category'];

    	$categoryrepo =new CategoryRepository;
    	$category = $categoryrepo->update_category($Request, $id);
        return response()->json([
        'success' => false,
        'category'  => $category,
        ], 200);
    }
}
