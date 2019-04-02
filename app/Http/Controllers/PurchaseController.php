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
            'code' => 'required|string|max:10'
        ]);

        $productrepo = new ProductRepository;
        $product = $productrepo->getprocod($request);
        // return response()->json($product);
        // echo json_encode($product);
        // print_r($product);exit();
        return view('purchase.detail', compact('product'));
    }

    public function store(Request $request)
    {
        $a = $request->all();
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
                        // 'purchase_facture'=>$facture[$index],
                        // 'suplier'=>$suplier[$index],
                        // 'date'=>$date[$index],
                        'product_id'=>$idpro[$index],
                        'qty'=>$qty[$index],  // Ambil dan set data nama sesuai index array dari $index
                      ));
      
                $index++;
        }


        $purchaserepo = new PurchaseRepository;
        $purchase = $purchaserepo->insertpurchasedetail($facture,$date,$suplier);
        // $purchase = $purchaserepo->insertpurchasedetail($facture,$code,$product,$qty,$date,$suplier);
        return redirect('purchase');

        // try{
        //     $purchaserepo = new purchaserepository;
        //     $purchase = $purchaserepo->insertpurchasedetail($facture,$code,$product,$qty,$date,$suplier);
        //      return redirect(route('purchase.index'))->with(['success' => '<strong>' . $product . '</strong> added successfully']);
        // }catch(\Exception $e)
        // {
        //     return redirect()->back()->with(['error'=>$e->getMessage()]);
        // }

    }
}
