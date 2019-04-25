<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\CustomerRepository;

class CustomerController extends Controller
{
    public function index()
    {
        $customerrepo =  new CustomerRepository();
        $customer = $customerrepo->getcustomer();
        return view('customer.index', compact('customer'));
    }

    public function create()
    {
        $customerrepo =  new CustomerRepository();
        $code = $customerrepo->getcode();
        return view('customer.create', compact('code'));
    }

    public function store(Request $request)
    {
        $name = $request['name'];
        $code = $request['code'];
        $address = $request['address'];
        $phone = $request['phone'];
        try{
            $customerrepo =  new CustomerRepository();
            $supliecustomer = $customerrepo->insert($name, $code,$address,$phone);
             return redirect(route('customer.index'))->with(['success' => '<strong>'.$code.'</strong> added successfully']);
        }catch(\Exception $e)
        {
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        $customerrepo =  new CustomerRepository();
        $customer = $customerrepo->delete($id);
        return redirect()->back()->with(['success'=>'<strong>'.''.'</strong> Delete Success']);
    }

    public function edit($id)
    {
        $customerrepo =  new CustomerRepository();
        $customer = $customerrepo->getid($id);
        return view('customer.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $name = $request['name'];
        $code = $request['code'];
        $address = $request['address'];
        $phone = $request['phone'];

        try{
            $customerrepo =  new CustomerRepository();
            $customer = $customerrepo->update($name, $code,$address,$phone,$id);
             return redirect(route('customer.index'))->with(['success' => '<strong>'.$code.'</strong> added successfully']);
        }catch(\Exception $e)
        {
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }
}
