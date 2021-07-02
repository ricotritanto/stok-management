<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use yajra\DataTables\Datatables;
use App\Repository\CustomerRepository;
use Auth;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $role = Auth::user()->level;
        $row = Auth::user()->id;
        $customerrepo =  new CustomerRepository();
        $cscode = $customerrepo->getcode();

        $customerrepo =  new CustomerRepository();
        $customer = $customerrepo->getcustomer();
        return view('customer.index', compact('customer','cscode','role','row'));
    }

    public function create()
    {
        $role = Auth::user()->level;
        $row = Auth::user()->id;
        $customerrepo =  new CustomerRepository();
        $code = $customerrepo->getcode();
        return view('customer.create', compact('code','role','row'));
    }

    public function store(Request $request)
    {
        $name = $request['name'];
        $code = $request['code'];
        $email = $request['email'];
        $address = $request['address'];
        $phone = $request['phone'];
        $city = $request['city'];
        $postal_code = $request['postal'];
        try{
            $customerrepo =  new CustomerRepository();
            $customer = $customerrepo->insert($name, $code, $email,$address,$phone, $city, $postal_code);
             return redirect(route('customer.index'))->with(['success' => ''.$name.' added successfully']);
        }catch(\Exception $e)
        {
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        $customerrepo =  new CustomerRepository();
        $customer = $customerrepo->delete($id);
        return redirect()->back()->with(['success'=>''.'Delete Success']);
    }

    public function edit($id)
    {
        $role = Auth::user()->level;
        $row = Auth::user()->id;
        $customerrepo = new CustomerRepository();
        $customer = $customerrepo->getid($id);
        return view('customer.edit', compact('customer','role','row'));
    }

    public function update(Request $request, $id)
    {
        $name = $request['name'];
        $code = $request['code'];
        $email = $request['email'];
        $address = $request['address'];
        $phone = $request['phone'];
        $city = $request['city'];
        $postal_code = $request['postal'];
        try{
            $customerrepo =  new CustomerRepository();
            $customer = $customerrepo->update($name, $code, $email,$address,$phone, $city, $postal_code, $id);
             return redirect(route('customer.index'))->with(['success' => ''.$name.' Update successfully']);
        }catch(\Exception $e)
        {
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }

    }
}
