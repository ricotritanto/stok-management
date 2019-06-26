<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\CategoryRepository;
use App\Repository\BrandRepository;
use App\Repository\ProductRepository;
use App\Repository\PurchaseRepository;
use App\Repository\SuplierRepository;

class PurchaseController extends Controller
{
    public function index()
    {
        $suplierrepo =  new SuplierRepository();
        $suplier = $suplierrepo->getsuplier();

        $purchaserepo =  new PurchaseRepository();
        $code = $purchaserepo->getfacture();
        return view('purchase.index', compact('code','suplier'));
    }

    public function getproduct(Request $request)
    {
        $this->validate($request, [
            'code' => 'required',
        ]);
        
        try{
            $productrepo = new ProductRepository;
            $product = $productrepo->getprocod($request);

            return view('purchase.detail', compact('product'));
        }catch(\Exception $e)
        {
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }

    public function store(Request $request)
    {
        $a = $request->all();
        $this->validate($request, [
                'product' => 'required',
                'qty' => 'required',
                'suplier' =>'required',
        ]);
        $idpro = $a['product'];
        $facture = $a['facture'];
        // $code = $a['code'];
        // $product = $a['name'];
        $qty = $a['qty'];
        $date = $a['date'];
        $suplier = $a['suplier'];
        
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
        // print_r($data);exit();
        $purchaserepo = new PurchaseRepository;
        $purchase = $purchaserepo->purchase($data);
        // $purchase = $purchaserepo->insertpurchasedetail($facture,$code,$product,$qty,$date,$suplier);
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
