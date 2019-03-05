<?php
namespace App\Repository;

use App\Model\Category;

class CategoryRepository{

	public function GetCategory()
	{
		 return Category::orderBy('created_at', 'DESC')->paginate(10);
	}

	public function create_category($request)
	{
		return Category::create(['category_name'=>$request]);
	}

	public function delete($id)
	{
		return category::where('category_id', $id)->delete();		
	}

	public function getidcat($id)
	{
		return category::where('category_id', $id)->first();
	}

	public function update_category($request, $id)
	{
		return category::Where('category_id', $id)->update(['category_name'=>$request]);
	}

}