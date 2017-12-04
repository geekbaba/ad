<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Advertising;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\UploadedFile;
use App\Libraries\AttachInterface\AttachHelper;
use App\Libraries\ShortUrlInterface\ShortUrlHelper;

class AdController extends WithAuthController
{
    /**
     */
    public function adList()
    {
        $ads = DB::table('ad_advertising')->leftJoin('ad_advertising_type','ad_advertising.advertising_type_id','=','ad_advertising_type.advertising_type_id')
        ->orderBy('ad_advertising.created_at')->select([
            'ad_advertising.advertising_id'
            ,'ad_advertising.advertising_name'
            ,'ad_advertising.status'
            ,'ad_advertising.creator'
            ,'ad_advertising.modified_by'
            ,'ad_advertising.created_at'
            ,'ad_advertising.updated_at'
            ,'ad_advertising.advertising_strategy'
            ,'ad_advertising.advertising_attribute'
            ,'ad_advertising.width_height'
            ,'ad_advertising.advertising_type_id'
            ,'ad_advertising_type.advertising_type_name'
        ])->paginate(5);
        //advertising_type_id
        return view('ad/list', ['ads' => $ads]);
        
    }
    
    public function create(){
        $types = DB::table('ad_advertising_type')->where('status',1)->get();
        //advertising_creative_product_attribute
        $ad_templates = Config::get('ad-template');
        return view('ad/create', ['types' => $types,'ad_templates_json'=>json_encode($ad_templates)]);
        
    }
    
    public function edit($advertising_id){
        
        $types = DB::table('ad_advertising_type')->where('status',1)->get();
        $AdvertisingModel = new Advertising();
        $advertising = $AdvertisingModel->where('advertising_id',$advertising_id)->first();
        
        //$advertising->advertising_attribute;
        $urlkeys = Config::get('urlkeys');
        
        if($advertising->advertising_attribute!=''){
            
            $advertising_attribute = json_decode($advertising->advertising_attribute);
            foreach ($advertising_attribute as $k=>$v){
                if(in_array($k, $urlkeys)){
                    $url = ShortUrlHelper::get($v);
                    $advertising_attribute->$k = $url;
                }else{
                    $advertising_attribute->$k = $v;
                }
                
            }
            $advertising->advertising_attributeObject = $advertising_attribute;
            $advertising->advertising_attribute = json_encode($advertising_attribute);
        }
        
        $ad_templates = Config::get('ad-template');
        return view('ad/edit', ['types' => $types, 'advertising'=>$advertising,'ad_templates_json'=>json_encode($ad_templates)]);
    }
    
    public function store(Request $request){
        
        $all = $request->all();
        $output = [
            'status'=>1
            ,'msg'=>'success'
        ];
        $data = [];
        
        $data['advertising_name'] = $all['advertising_name'];
        
        $data['status'] = isset($all['status']) ? $all['status'] : '1';
        
        $data['advertising_type_id'] = $all['advertising_type_id'];
        
        
        //$data['advertising_attribute'] = $all['advertising_attribute'];
        //$data['attribute']['width_height'];
        //$data['attribute']['target_url'];
        //$data['attribute']['image'];
        $attribute = [];
        //Log::info();
        Log::info(print_r($all,true));
        
        foreach ($all['attribute'] as $key=>$value){
            
            if($value instanceof UploadedFile){
                
                if($value->isValid()) {
                    $attach = AttachHelper::upload($value);
                    $attribute[$key] = $attach->hash_key;
                }else{
                    $output = [
                        'status'=>0
                        ,'msg'=>'upload failed'
                    ];
                    return response()->json($output);
                }
            }else{
                if(in_array($key, ['width_height'])){
                    $data[$key] = $value;
                }
                $urlkeys = Config::get('urlkeys');
                
                //处理成短链接
                if(in_array($key, $urlkeys)){
                    
                    $short_url = ShortUrlHelper::make($value);
                    $attribute[$key] = $short_url;
                    
                }else{
                    $attribute[$key] = $value;
                }
            }
        }
        
        $data['advertising_attribute'] = json_encode($attribute);
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
        
        //print_r($all,true);
        //return response()->json($all);
        //资源处理到底是本地硬盘还是
        //dump($all);
        $AdvertisingModel = new Advertising();
        if(isset($all['advertising_id']) && $all['advertising_id']!=''){
            $data['modified_by'] = $this->user->user_id;
            
            $result = $AdvertisingModel->where('advertising_id',$all['advertising_id'])->update($data);
        }else{
            
            $data['creator'] = $this->user->user_id;
            
            $result = $AdvertisingModel->create($data);
        }
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
