<?php
namespace App\Repository;

// use Illuminate\Support\Facades\DB;
use App\Model\Category;
use App\Model\Brand;
use App\Model\Products;

class ProductRepository{

	public function generateCode()
	{
      	// $query = DB::table('product')
       //               ->select(DB::raw('RIGHT as product_code, code'))
       //               ->orderby('product_id','DESC')
       //               ->limit(1)   
       //               ->get();   
      	// if($query->num_rows() <> 0)
      	// {       
	      //  	//jika kode ternyata sudah ada.      
	      //  	$data = $query->row();      
	      //  	$kode = intval($data->kode) + 1;     
      	// }
      	// else
      	// {       
	      //  	//jika kode belum ada      
	      //  	$kode = 1;     
      	// }
	      // 	$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);    
	      // 	$kodejadi = "BRG".$kodemax;   print_r($kodejadi);exit();
	      // 	return $kodejadi;  
	}

	function create_product($name,$code,$serial,$brand,$category,$description,$stock,$price,$sell)
	{
		return products::create(['product_name'=>$name,
								'product_kode' =>$code,
								'serial' =>$serial,
								'brand_id' =>$brand,
								'category_id' =>$category,
								'purchase_price' =>$price,
								'sell_price' =>$sell,
								'stocks' =>$stock,
								'description' =>$description]);
									
	}

	function getProduct()
	{
		// return transaction_detail::with('category')->with('category.kategoris')->with('transaction.transaction_status')
		return products::with('brand')->with('category')->orderBy('created_at', 'Desc')->paginate(5);
	}

	function delete($id)
	{
		return products::where('id', $id)->delete();
	}

	function getproductid($id)
	{
		return products::where('id', $id)->first();
	}

	function update_product($id,$name,$code,$serial,$brand,$category,$description,$stock,$price,$sell)
	{
		return products::Where('id', $id)->update(['product_name'=>$name,
												   'product_kode' =>$code,
												   'serial' =>$serial,
												   'brand_id' =>$brand,
												   'category_id' =>$category,
												   'purchase_price' =>$price,
												   'sell_price' =>$sell,
												   'stocks' =>$stock,
												   'description' =>$description]);	
	}

	public function getprocod($request)
	{
		 return products::Where('product_kode', $request['code'])->first();
	}
}