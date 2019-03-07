<?php
namespace App\Repository;

use App\Model\Brand;

class BrandRepository{

	public function Getbrand()
	{
		 return brand::orderBy('created_at', 'DESC')->paginate(10);
	}

	public function create_brand($request)
	{
		return brand::create(['brand_name'=>$request]);
	}

	public function delete($id)
	{
		return brand::where('brand_id', $id)->delete();		
	}

	public function getid($id)
	{
		return brand::where('brand_id', $id)->first();
	}

	public function update_brand($request, $id)
	{
		return brand::Where('brand_id', $id)->update(['brand_name'=>$request]);
	}

}