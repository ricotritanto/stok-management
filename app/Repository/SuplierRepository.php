<?php
namespace App\Repository;

// use Illuminate\Support\Facades\DB;
use App\Model\suplier;

class SuplierRepository{

    public function getsuplier()
    {
        return suplier::orderBy('created_at', 'DESC')->paginate(10);
    }

    public function insert($name, $code, $email,$address,$phone, $city, $postal_code)
    {
        return suplier::create(['suplier_name'=>$name,
								'suplier_code' =>$code,
								'email' =>$email,
								'phone' =>$phone,
                                'address' =>$address,
                                'city' => $city,
                                'postal_code' => $postal_code]);	
    }

    public function delete($id)
    {
        return suplier::where('id', $id)->delete();
    }

    public function getid($id)
    {
        return suplier::where('id',$id)->first();
    }

    public function update($name, $code, $email,$address,$phone, $city, $postal_code, $id)
    {
        return suplier::where('id', $id)->update(['suplier_name'=>$name,
                                                'suplier_code' =>$code,
                                                'email' =>$email,
                                                'phone' =>$phone,
                                                'address' =>$address,
                                                'city' => $city,
                                                'postal_code' => $postal_code]);	
    }

    function getcode()
    {
        $cek =  suplier::max('suplier_code');
        $data =substr($cek, 4);  
        $kd ="SP";
        $no = 1;
        if($data)
        {
            $sum = $data +1 ;
            $a = $kd.sprintf("%03d",$sum);
        }else{
            $a = $kd.sprintf("%03d",$no);
        }      
        return $a;
    }
}