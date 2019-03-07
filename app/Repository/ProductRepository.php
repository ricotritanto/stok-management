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

	function create_product($name,$code,$brand,$category,$description,$stock)
	{
		return products::create(['product_name'=>$name,
								'product_code' =>$code,
								'brand_id' =>$brand,
								'category_id' =>$category,
								'stocks' =>$stock,
								'description' =>$description]);

		
	}

	function getProduct()
	{
		// return transaction_detail::with('category')->with('category.kategoris')->with('transaction.transaction_status')
		return products::with('brand')->with('category')->orderBy('created_at', 'Desc')->get();
	}
}