<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
    	// $categoryrepo=new CategoryRepository;
	    // $category = $categoryrepo->GetCategory();
        // return view('category.index', compact('category'));
        $category = Category::with(['parent'])->orderBy('created_at', 'DESC')->paginate(10);
        $parent = Category::getParent()->orderBy('name', 'ASC')->get();
        return view('categories.index', compact('category','parent'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:50|unique:categories'
        ]);

        $request->request->add(['slug'=> $request->name]);
        Category::create($request->except('_token'));

        return redirect(route('category.index'))->with(['success' => 'New Category Added']);
    }

    public function destroy($id)
    {
        $category = Category::withCount(['child', 'product'])->find($id);
        if($category->child_count == 0 && $category->product_count == 0) {
            $category->delete();
            return redirect( route ('category.index'))->with(['success'=> 'Delete Category Success !!']);
        }
        return redirect(route('category.index'))->with(['error' => 'This Category have been child !!']);
    }

    public function edit($id)
    {
    	$category = Category::Find($id);
        $parent = Category::getParent()->orderBy('name','ASC')->get();

        return view('categories.edit', compact('category','parent'));
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request, [
            'name' => 'required|string|max:50|unique:categories'
        ]);
        
        $category = Category::Find($id);
        $category->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id
        ]);

        return redirect( route ('category.index'))->with(['success' => " Update Category Success!!"]);
    }
}
