<?php
namespace App\Repository;

use App\Category;
// use App\User;

class CategoryRepository{

	public function GetCategory()
	{
		 return Category::orderBy('created_at', 'DESC')->paginate(5);
	}

	public function create_category($request)
	{
		return Category::create(['category_name'=>$request]);
	}

	public function delete($id)
	{
		return category::where('id', $id)->delete();		
	}

	public function getidcat($id)
	{
		return category::where('id', $id)->first();
	}

	public function update_category($request, $id)
	{
		return category::Where('id', $id)->update(['category_name'=>$request]);
	}

}