<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\UploadedFile;
use App\Libraries\AttachInterface\AttachHelper;
use App\Libraries\AttachInterface\Attach;
use App\Model\AdvertisingSpace;
use Illuminate\Support\Facades\Log;
use App\Model\AdvertisingType;
use App\Libraries\AdvertisingSpace\AdvertisingSpace as AdvertisingSpaceCodeMaker;
class MediaAdvertisingSpaceController extends WithAuthController
{
    
    public function adSpaceList(){
        
        $advertising_spaces = DB::table('media_advertising_space')->where('status',1)->paginate(5);
        
        $advertising_type_ids = [];
        
        foreach ($advertising_spaces as $advertising_space){
            $advertising_type_ids[] = $advertising_space->advertising_type_id;
        }
        
        $AdvertisingTypeModel = new AdvertisingType();
        
        $advertisingtypes = $AdvertisingTypeModel->whereIn('advertising_type_id',$advertising_type_ids)->get();
        
        $advertisingTypeMap = [];
        
        foreach ($advertisingtypes as $advertisingtype){
            $advertisingTypeMap[$advertisingtype->advertising_type_id] = $advertisingtype;
        }
        
        return view('adspace/list', ['advertising_spaces' => $advertising_spaces,'advertisingTypeMap'=>$advertisingTypeMap]);
    }
    
    public function create(){
        
        $types = DB::table('ad_advertising_type')->where('status',1)->get();
        //advertising_creative_product_attribute
        $adspace_configures = Config::get('adspace-0001');
        
        return view('adspace/create', ['types' => $types,'adspace_configures_json'=>json_encode($adspace_configures)]);
    }
    
    public function edit($advertising_space_id){
        
        $types = DB::table('ad_advertising_type')->where('status',1)->get();
        $AdvertisingSpaceModel = new AdvertisingSpace();
        $advertising_space = $AdvertisingSpaceModel->where('advertising_space_id',$advertising_space_id)->first();
        
        //$advertising->advertising_attribute;
        
        if($advertising_space->advertising_space_attribute!=''){
            
            $advertising_space_attribute = json_decode($advertising_space->advertising_space_attribute);
            $advertising_space->advertising_space_attributeObject = $advertising_space_attribute;
        }
        
        $adspace_configures = Config::get('adspace-0001');
        
        return view('adspace/edit', ['types' => $types, 'advertising_space'=>$advertising_space,'adspace_configures_json'=>json_encode($adspace_configures)]);
    }
    
    public function store(Request $request){
        
        $all = $request->all();
        $output = [
            'status'=>1
            ,'msg'=>'success'
        ];
        $data = [];
        
        $data['advertising_space_name'] = $all['advertising_space_name'];
        
        $data['status'] = isset($all['status']) ? $all['status'] : '1';
        
        $data['advertising_type_id'] = $all['advertising_type_id'];
        
        $data['media_id'] = isset($all['media_id']) ? $all['media_id'] : '1';
        $data['media_id'] = isset($all['media_id']) ? $all['media_id'] : '1';
        
        //$data['advertising_attribute'] = $all['advertising_attribute'];
        //$data['attribute']['width_height'];
        //$data['attribute']['target_url'];
        //$data['attribute']['image'];
        $attribute = [];
        //Log::info();
        //Log::info(print_r($all,true));
        
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
                
                $attribute[$key] = $value;
            }
        }
        
        $data['advertising_space_attribute'] = json_encode($attribute);
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
        AdvertisingSpaceCodeMaker::init();
        $AdvertisingSpaceModel = new AdvertisingSpace();
        if(isset($all['advertising_space_id']) && $all['advertising_space_id']!=''){
            $data['modified_by'] = $this->user->user_id;
            $advertising_space_id = $all['advertising_space_id'];
            
            $result = $AdvertisingSpaceModel->where('advertising_space_id',$advertising_space_id)->update($data);
            
            $code = AdvertisingSpaceCodeMaker::makeCode($advertising_space_id);
            
            $AdvertisingSpaceModel->where('advertising_space_id',$advertising_space_id)->update(['advertising_space_code'=>$code]);
            
        }else{
            
            $data['creator'] = $this->user->user_id;
            
            $result = $AdvertisingSpaceModel->create($data);
            $advertising_space_id = $result->advertising_space_id;
            
            $code = AdvertisingSpaceCodeMaker::makeCode($advertising_space_id);
            
            $AdvertisingSpaceModel->where('advertising_space_id',$advertising_space_id)->update(['advertising_space_code'=>$code]);
            
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
