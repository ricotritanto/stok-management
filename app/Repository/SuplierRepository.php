<?php
namespace App\Repository;

// use Illuminate\Support\Facades\DB;
use App\Model\suplier;

class SuplierRepository{

    public function getsuplier()
    {
        return suplier::orderBy('created_at', 'DESC')->paginate(10);
    }

    public function insert($name, $code, $email,$address,$phone)
    {
        return suplier::create(['suplier_name'=>$name,
								'suplier_code' =>$code,
								'email' =>$email,
								'phone' =>$phone,
								'address' =>$address]);	
    }

    public function delete($id)
    {
        return suplier::where('id', $id)->delete();
    }

    public function getid($id)
    {
        return suplier::where('id',$id)->first();
    }

    public function update($name, $code, $email,$address,$phone,$id)
    {
        return suplier::where('id', $id)->update(['suplier_name'=>$name,
                                                'suplier_code' =>$code,
                                                'email' =>$email,
                                                'phone' =>$phone,
                                                'address' =>$address]);	
    }

}