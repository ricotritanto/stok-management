<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\CategoryRepository;
use App\Repository\BrandRepository;
use App\Repository\ProductRepository;
use App\Repository\PurchaseRepository;
use App\Repository\SuplierRepository;
use PDF;

class PurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
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
            // $product = $product->where('name', 'like', '%'. request().'%');
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
        $idpro = $a['product'];
        $facture = $a['facture'];
        $total = $a['total'];
        $grandtotal = $a['grandtot'];
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
                        'total'=>$total[$index],
                        'grandtotal' => $grandtotal,
                        'qty'=>$qty[$index],  // Ambil dan set data nama sesuai index array dari $index
                      ));
      
                $index++;
        }
        // print_r($data);exit();
        try
        {
            $purchaserepo = new PurchaseRepository;
            $purchase = $purchaserepo->purchase($data);
            return redirect(route('purchase.index'))->with(['success' => 'Save Success']);
        }catch(\Exception $e)
        {
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }

    public function generatepdf()
    {
        $facture = ['PF00001/11/2019'];
        $purchaserepo = new PurchaseRepository;
        $datane = $purchaserepo->getnota($facture);

        // print_r($datane);exit();

        $suplierrepo =  new SuplierRepository();
        $suplier = $suplierrepo->getsuplier();

        $header = ['StarCCTV'];
        
        $pdf = PDF::loadview('purchase.pdf',compact('header','datane','suplier'));
        return $pdf->download('generate-purchase');
    }
}
