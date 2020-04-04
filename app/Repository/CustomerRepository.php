<?php
namespace App\Repository;

// use Illuminate\Support\Facades\DB;
use App\customer;

class CustomerRepository{

    public function getcustomer()
    {
        return customer::orderBy('created_at', 'DESC')->paginate(5);
    }

    public function insert($name, $code, $email,$address,$phone, $city, $postal_code)
    {
        return customer::create(['name'=>$name,
                                'customer_code' =>$code,
                                'email' =>$email,
                                'phone' =>$phone,
                                'address' =>$address,
                                'city' => $city,
                                'postal_code' => $postal_code]);    
    }

    public function delete($id)
    {
        return customer::where('id', $id)->delete();
    }

    public function getid($id)
    {
        return customer::where('id',$id)->first();
    }

    public function update($name, $code, $email,$address,$phone, $city, $postal_code,$id)
    {
        return customer::where('id', $id)->update(['name'=>$name,
                                                    'customer_code' =>$code,
                                                    'email' =>$email,
                                                    'phone' =>$phone,
                                                    'address' =>$address,
                                                    'city' => $city,
                                                    'postal_code' => $postal_code]);   
    }

    function getcode()
    {
        $cek =  customer::max('customer_code');
        $data =substr($cek, 4);  
        $kd ="CS";
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