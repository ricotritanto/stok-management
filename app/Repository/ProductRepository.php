<?php
namespace App\Repository;

use Illuminate\Support\Facades\DB;
use App\Category;
use App\Satuan;
use App\Product;

class ProductRepository{

	public function generateCode()
	{
        $q=DB::table('products')->select(DB::raw('MAX(RIGHT(code,4)) as kd_max'));
        $prx= "BRG";
        if($q->count()>0)
        {
            foreach($q->get() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = $prx.sprintf("%06s", $tmp);
            }
        }
        else
        {
            $kd = $prx."000001";
        }

        return $kd;
	}

	function create_product($name,$code,$serial,$brand,$category,$satuan,$description,$stock,$price,$sell)
	{
		return product::create(['product_name'=>$name,
								'product_kode' =>$code,
								'serial' =>$serial,
								'brand_id' =>$brand,
								'category_id' =>$category,
                                'satuan_id' =>$satuan,
								'purchase_price' =>$price,
								'sell_price' =>$sell,
								'stocks' =>$stock,
								'description' =>$description]);

	}

	function getProduct()
	{
		return product::with('brand')->with('category')->orderBy('created_at', 'Desc')->paginate(5);
	}

	function delete($id)
	{
		return product::where('id', $id)->delete();
	}

	function getproductid($id)
	{
		return product::where('id', $id)->first();
	}

	function update_product($id,$name,$code,$serial,$brand,$category,$satuan,$description,$stock,$price,$sell)
	{
		return product::Where('id', $id)->update(['product_name'=>$name,
												   'product_kode' =>$code,
												   'serial' =>$serial,
												   'brand_id' =>$brand,
												   'category_id' =>$category,
                                                   'satuan_id' =>$satuan,
												   'purchase_price' =>$price,
												   'sell_price' =>$sell,
												   'stocks' =>$stock,
												   'description' =>$description]);
	}

	public function getprocod($code)
	{
		 return product::Where('code', $code)->first();
	}
}
