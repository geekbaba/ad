<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Advertising;
use Illuminate\Support\Facades\Config;

class AdController extends WithAuthController
{
    /**
     */
    public function adList()
    {
        $ads = DB::table('ad_advertising')->leftJoin('ad_advertising_type','ad_advertising.advertising_type_id','=','ad_advertising_type.advertising_type_id')
        ->paginate(2);
        //advertising_type_id
        return view('ad/list', ['ads' => $ads]);
        
    }
    
    public function create(){
        $types = DB::table('ad_advertising_type')->where('status',1)->get();
        //advertising_creative_product_attribute
        $ad_templates = Config::get('ad-template');
        dump($ad_templates);
        return view('ad/create', ['types' => $types,'ad_templates_json'=>json_encode($ad_templates)]);
        
    }
    public function store(Request $request){
        
        $all = $request->all();
        $output = [
            'status'=>1
            ,'msg'=>'success'
        ];
        $data = [];
        
        $data['advertising_name'] = $all['advertising_name'];
        
        $data['status'] = isset($all['status']) ?? '';
        
        $data['advertising_type_id'] = $all['advertising_type_id'];
        
        
        $data['advertising_attribute'] = $all['advertising_attribute'];
        
        $data['creator'] = $this->user->user_id;
        
        //dump($all);
        $AdvertisingModel = new Advertising();
        
        $result = $AdvertisingModel->create($data);
        if($result){
            $output = [
                'status'=>1
                ,'msg'=>'success'
            ];
        }else{
            $output = [
                'status'=>0
                ,'msg'=>'failed'
            ];
        }
        return response()->json($output);
        
        
    }
    
}
