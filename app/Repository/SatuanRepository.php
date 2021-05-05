<?php
namespace App\Repository;

// use Illuminate\Support\Facades\DB;
use App\Satuan;

class SatuanRepository{

    public function getsatuan()
    {
        return satuan::orderBy('created_at', 'DESC')->paginate(5);
    }

    public function insert($name)
    {
        return satuan::create(['name'=>$name]);
    }

    public function delete($id)
    {
        return satuan::where('id', $id)->delete();
    }

    public function getid($id)
    {
        return satuan::where('id',$id)->first();
    }

    public function update($name)
    {
        return satuan::where('id', $id)->update(['name'=>$name]);
    }

}
