<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use yajra\DataTables\Datatables;
use App\Repository\CustomerRepository;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $customerrepo =  new CustomerRepository();
        $cscode = $customerrepo->getcode();

        $customerrepo =  new CustomerRepository();
        $customer = $customerrepo->getcustomer();
        return view('customer.index', compact('customer','cscode'));
    }

    public function create()
    {
        $customerrepo =  new CustomerRepository();
        $cscode = $customerrepo->getcode();
        return view('customer.create', compact('cscode'));
    }

    public function store(Request $request)
    {
        $data = [
            'customer_code' =>$request['code'],
            'name' => $request['name'],
            'phone' =>$request['phone'],
            'address' => $request['address']
        ];
        $customerrepo =  new CustomerRepository();
        $customer = $customerrepo->insert($data);

        return response()->json([
            'error' => false,
            'customer'  => $customer,
        ], 200);

        // try{
        //     $customerrepo =  new CustomerRepository();
        //     $customer = $customerrepo->insert($data);
        //         return redirect(route('customer.index'))->with(['success' => '<strong>'.$code.'</strong> added successfully']);
        // }catch(\Exception $e)
        // {
        //     return redirect()->back()->with(['error'=>$e->getMessage()]);
        // }
       
    }

    public function destroy($id)
    {
        $customerrepo =  new CustomerRepository();
        $customer = $customerrepo->delete($id);

        return response()->json([
            'error' => false,
            'customer'  => $customer,
        ], 200);
    }

    public function show($id)
    {
        $customerrepo =  new CustomerRepository();
        $customer = $customerrepo->getid($id);
        return response()->json([
            'success' => false,
            'customer'  => $customer,
        ], 200);


    }

    public function update(Request $request, $id)
    {
        $name = $request['name'];
        $code = $request['code'];
        $address = $request['address'];
        $phone = $request['phone'];
        $customerrepo =  new CustomerRepository();
        $customer = $customerrepo->update($name, $code,$address,$phone,$id);
        return response()->json([
            'error' => false,
            'customer'  => $customer,
        ], 200);
        // try{
        //     $customerrepo =  new CustomerRepository();
        //     $customer = $customerrepo->update($name, $code,$address,$phone,$id);
        //     return response()->json([
        //         'error' => false,
        //         'customer'  => $customer,
        //     ], 200);
        //     //  return redirect(route('customer.index'))->with(['success' => '<strong>'.$code.'</strong> added successfully']);
        // }catch(\Exception $e)
        // {
        //     return redirect()->back()->with(['error'=>$e->getMessage()]);
        // }
        
    }
}
