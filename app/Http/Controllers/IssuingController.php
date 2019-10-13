<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\CategoryRepository;
use App\Repository\BrandRepository;
use App\Repository\ProductRepository;
use App\Repository\IssuingRepository;
use App\Repository\CustomerRepository;
use PDF;

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
            
            // // print_r($product['stocks']);exit();
            if (empty($product['produk_kode']) && $product['stocks']<=0 ) {
               echo '<script language="javascript">';
               echo 'alert("Out Of Stock!")';
               echo '</script>';

            }else
            {
                return view('issuing.detail', compact('product'));
            }
        }catch(\Exception $e)
        {
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }

    public function store(Request $request)
    {
        $a = $request->all();


        $facture = $a['facture'];
        $date = $a['date'];
        $customer = $a['customer'];
        $grandtot = $a['grandtot'];
        $idpro = $a['product'];      
        $qty = $a['qty'];
        $total = $a['total'];
        
        $data =array();

        $index=0;
        foreach ($idpro as $key ) 
        {
            array_push($data, array(
                        'issuing_facture'=>$facture,
                        'customer_id'=>$customer,
                        'date'=>$date,
                        'grandtotal'=>$grandtot,
                        'product_id'=>$idpro[$index],
                        'qty'=>$qty[$index],  // Ambil dan set data nama sesuai index array dari $index
                        'total'=>$total[$index],
                      ));
                $index++;
        }
        try
        {
            $issuingrepo = new IssuingRepository;
            $issuing = $issuingrepo->issuing($data);
            return redirect('issuing')->with(['success' => 'Save Success']);
            // return redirect()->route('invoice', $issuing->issuing_facture);
        }catch(\Exception $e)
        {
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }

    public function invoice()
    {
        $header = ['title' => 'Invoice StarCCTV'];
        $pdf = PDF::loadview('issuing.index',['header'=>$header]);
        return $pdf->download('laporan-issuing-pdf');
    }
}
