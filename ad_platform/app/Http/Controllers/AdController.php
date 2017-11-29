<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Advertising;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

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
        return view('ad/create', ['types' => $types,'ad_templates_json'=>json_encode($ad_templates,JSON_UNESCAPED_SLASHES)]);
        
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
        
        
        //$data['advertising_attribute'] = $all['advertising_attribute'];
        $data['attribute']['width_height'];
        $data['attribute']['target_url'];
        $data['attribute']['image'];
        /**
         * [image] => Illuminate\Http\UploadedFile Object
                (
                    [test:Symfony\Component\HttpFoundation\File\UploadedFile:private] =>
                    [originalName:Symfony\Component\HttpFoundation\File\UploadedFile:private] => gt-cart.jpg
                    [mimeType:Symfony\Component\HttpFoundation\File\UploadedFile:private] => image/jpeg
                    [size:Symfony\Component\HttpFoundation\File\UploadedFile:private] => 711
                    [error:Symfony\Component\HttpFoundation\File\UploadedFile:private] => 0
                    [hashName:protected] =>
                    [pathName:SplFileInfo:private] => /private/var/tmp/phpf7TDO9
                    [fileName:SplFileInfo:private] => phpf7TDO9
                )
         */
        
        $data['creator'] = $this->user->user_id;
        //print_r($all,true);
        Log::info(print_r($all,true));
        return response()->json($all);
        //资源处理到底是本地硬盘还是
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
