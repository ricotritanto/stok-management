<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use yajra\DataTables\Datatables;
use App\Repository\SatuanRepository;
use Auth;


class SatuanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $role = Auth::user()->level;
        $row = Auth::user()->id;
        $satuanrepo =  new SatuanRepository();
        $satuan = $satuanrepo->getsatuan();
        return view('satuan.index', compact('satuan','role','row'));
    }

    public function create()
    {
        $satuanrepo =  new SatuanRepository();
        return view('satuan.index', compact('satuan'));
    }

    public function store(Request $request)
    {
        $name = $request['name'];
        try{
            $satuanrepo =  new SatuanRepository();
            $satuan = $satuanrepo->insert($name);
             return redirect(route('satuan.index'))->with(['success' => ''.$name.' added successfully']);
        }catch(\Exception $e)
        {
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        $satuanrepo =  new SatuanRepository();
        $satuan = $satuanrepo->delete($id);
        return redirect()->back()->with(['success'=>''.'Delete Success']);
    }

    public function edit($id)
    {
        $role = Auth::user()->level;
        $row = Auth::user()->id;
        $satuanrepo = new SatuanRepository();
        $satuan = $satuanrepo->getid($id);
        return view('satuan.edit', compact('satuan','role','row'));
    }

    public function update(Request $request, $id)
    {
        $name = $request['name'];
        try{
            $satuanrepo = new SatuanRepository();
            $satuan = $satuanrepo->update($name, $id);
             return redirect(route('satuan.index'))->with(['success' => ''.$name.' Update successfully']);
        }catch(\Exception $e)
        {
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }

    }
}
