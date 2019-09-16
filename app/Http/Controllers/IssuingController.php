<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\CategoryRepository;
use App\Repository\BrandRepository;
use App\Repository\ProductRepository;
use App\Repository\IssuingRepository;
use App\Repository\CustomerRepository;

class IssuingController extends Controller
{
    public function index()
    {
        $customerrepo =  new CustomerRepository();
        $customer = $customerrepo->getcustomer();

        $customerrepo =  new CustomerRepository();
        $cscode = $customerrepo->getcode();

        $issuingrepo =  new IssuingRepository();
        $code = $issuingrepo->getfacture();
        return view('issuing.index', compact('code','customer','cscode'));
    }

    public function getproduct(Request $request)
    {
        $this->validate($request, [
            'code' => 'required',
        ]);
        
        try{
            $productrepo = new ProductRepository;
            $product = $productrepo->getprocod($request);

            return view('issuing.detail', compact('product'));
        }catch(\Exception $e)
        {
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }

    public function store(Request $request)
    {
        $a = $request->all();
        print_r($a);exit();

        $idpro = $a['code'];
        $facture = $a['facture'];
        $date = $a['date'];
        // $code = $a['code'];
        // $product = $a['name'];
        $qty = $a['qty'];
        
        $customer = $a['customer'];
        
        $data =array();

         $index=0;
        foreach ($idpro as $key ) 
        {
            array_push($data, array(
                        'purchase_facture'=>$facture,
                        'suplier'=>$suplier,
                        'date'=>$date,
                        'product_id'=>$idpro[$index],
                        'qty'=>$qty[$index],  // Ambil dan set data nama sesuai index array dari $index
                      ));
      
                $index++;
        }
        $purchaserepo = new PurchaseRepository;
        $purchase = $purchaserepo->purchase($data);
        try
        {
            $purchaserepo = new PurchaseRepository;
            $purchase = $purchaserepo->purchase($data);
            return redirect('purchase')->with(['success' => 'Save Success']);
        }catch(\Exception $e)
        {
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }
}
