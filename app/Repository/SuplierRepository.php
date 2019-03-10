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

    function getcode()
    {
        $cek =  suplier::max('suplier_code');
        // $cek = suplier::Raw('(select max(right(suplier_code, 4) as kd_max))');
        $data =substr($cek, 4);
        // $cek = suplier::raw('count(*) as suplier_code');   
        // print_r($data);exit();    
        $kd ="SP";
        $no = 1;
        if($data)
        {
            $sum = $data +1 ;
            $a = $kd.sprintf("%03d",$sum);
        }else{
            $a = $kd.sprintf("%03d",$no);
        }
        // if($data->count()>0)
        // {
        //     foreach($data->get() as $k)
        //     {
        //         $tmp = ((int)$k->kd_max)+1;
        //         $a = $kd.sprintf("%03d", $tmp);
        //         print_r($a);exit();
        //     }              
        // }else{
        //     $a = $kd."001";
        // }
        return $a;
    }
}