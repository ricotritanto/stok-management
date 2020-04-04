<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suplier;
use App\Repository\SuplierRepository;

class SuplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $suplierrepo =  new SuplierRepository();
        $suplier = $suplierrepo->getsuplier();
        return view('suplier.index', compact('suplier'));
    }

    public function create()
    {
        $suplierrepo =  new SuplierRepository();
        $code = $suplierrepo->getcode();
        return view('suplier.create', compact('code'));
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
            $suplierrepo =  new SuplierRepository();
            $suplier = $suplierrepo->insert($name, $code, $email,$address,$phone, $city, $postal_code);
             return redirect(route('suplier.index'))->with(['success' => ''.$name.' added successfully']);
        }catch(\Exception $e)
        {
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        $suplierrepo =  new SuplierRepository();
        $suplier = $suplierrepo->delete($id);
        return redirect()->back()->with(['success'=>''.'Delete Success']);
    }

    public function edit($id)
    {
        $suplierrepo = new SuplierRepository();
        $suplier = $suplierrepo->getid($id);
        return view('suplier.edit', compact('suplier'));
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
            $suplierrepo =  new SuplierRepository();
            $suplier = $suplierrepo->update($name, $code, $email,$address,$phone, $city, $postal_code,$id);
             return redirect(route('suplier.index'))->with(['success' => ''.$name.' added successfully']);
        }catch(\Exception $e)
        {
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }
}
