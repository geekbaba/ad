<?php

namespace App\Http\Controllers;

use App\Model\ActivityProduct;
use App\Model\ActivitySkin;
use App\Model\CookiesProduct;
use Illuminate\Http\Request;
use App\Libraries\AdSelector\Selector;
use App\Libraries\ProductSelector\Selector as ProductSelector;
use App\Libraries\AdvertisingSpace\Slot;
use App\Traits\RequestPretreatment;
use App\Libraries\AdRender\Render;
use \App\Libraries\ActivityRender\Render as ActivityRender;
use App\Model\Activity;
use Illuminate\Support\Facades\Cookie;
use App\Model\CookiesMap;
use App\Libraries\ShortUrlInterface\ShortUrlHelper;

class RequestController extends Controller
{
    use RequestPretreatment;
    
    public function selectAd(Request $request,$slot){
        
        Selector::init();
        
        $attr = Slot::extract($slot);
        $request_information = $this->getRequestInformation($request);
        
        $attr = array_merge($attr,$request_information);
        
        $ad = Selector::select($attr);
        
        if(!empty($ad)){
            //选到广告
            
        }else{
            //默认广告
        }
        
        Render::init();
        
        $render = Render::render($ad);
        //render//$target_url
        
        //$foreverCookie = Cookie::forever('forever', 'Success');
        //$tempCookie = Cookie::make('temporary', 'My name is fantasy', 5);//参数格式：$name, $value, $minutes
        //return Response::make()->withCookie($foreverCookie)->withCookie($tempCookie);
        $log_type = 'QUERY_AD';
        
        $pos='0,0';
        
        //$hash_string = sprintf("");
        $cookies = $request->cookie();
        
        if(isset($cookies['uuid'])){
            $otherinfo = 'EXIST_COOKIE:'.$cookies['uuid'];
            
            $foreverCookie = Cookie::forever('uuid', $cookies['uuid']);
            
        }else{
            
            $CookiesMapModel = new CookiesMap();
            
            $cookies_string = $this->getCookiesString($request);
            
            $cookiemap = $CookiesMapModel->create([
                'cookies_uuid'=>''
                ,'status'=>1
                ,'cookies'=>$cookies_string
                ,'advertising_space_id'=>$attr['advertising_space_id']
                ,'slot'=>$slot
            ]);
            $uuid = md5($cookiemap->cookies_map_id);
            $cookiemap->cookies_uuid = $uuid;
            $cookiemap->save();
            
            $otherinfo = 'CREATE_COOKIE:'.$uuid;
            
            $foreverCookie = Cookie::forever('uuid', $uuid);
        }
        $slotCookie = Cookie::forever('goojo_ad_slot', $slot);
        
        //
        $this->make($request,$log_type,$ad->advertising_id,$slot,$pos,$otherinfo);
        
        return response()->view($render['template'],$render['data'])->cookie($slotCookie)->cookie($foreverCookie);
    }
    
    
    public function showActivity(Request $request,$activity_id){
        
        $ActivityModel = new Activity();
        $activity = $ActivityModel->where('activity_id',$activity_id)->first();

        $ActivitySkinModel = new ActivitySkin();

        $skins = $ActivitySkinModel->where('activity_id',$activity_id)->get();

        //activity_skin_attribute
        $count = $skins->count();

        $i = (int) rand(0,$count);

        foreach ($skins as $index=>$skin){
            if($index==$i){
                break;
            }
        }

        $render = ActivityRender::render($activity,$skin);
        
        $log_type = 'ACTIVITY_SHOW';
        
        $pos='0,0';
        
        //$hash_string = sprintf("");
        $cookies = $request->cookie();
        
        if(isset($cookies['uuid'])){
            $otherinfo = 'EXIST_COOKIE:'.$cookies['uuid'];
            
            $slot = Cookie::get('goojo_ad_slot');
        }else{
            //非正常请求
            $otherinfo = 'no_info';
            $slot = '';
        }
        
        //
        $this->make($request,$log_type,$activity_id,$slot,$pos,$otherinfo);
        //dump($render);
        return response()->view($render['template'],$render['data']);
        
    }
    
    //选择产品
    public function selectProduct(Request $request,$activity_id,$slot=''){
        
        $request->all();
        
        $request_information = $this->getRequestInformation($request);
        if($slot!=''){
            $attr = Slot::extract($slot);
            $attr = array_merge($attr,$request_information);
            
        }else{
            $attr = $request_information;
        }
        $ActivityModel = new Activity();
        $activity = $ActivityModel->where('activity_id',$activity_id)->first();
        ProductSelector::init();
        $product = ProductSelector::select($attr);
        $output = ['status'=>1
                   ,'msg'=>'success'
                   ,'data'=>$product
                ];
        $log_type = 'PRODUCT_SHOW';
        
        $pos='0,0';
        
        //$hash_string = sprintf("");
        $cookies = $request->cookie();
        
        if(isset($cookies['uuid'])){
            $otherinfo = 'EXIST_COOKIE:'.$cookies['uuid'];
            $otherinfo .= ',activity_id:'.$activity_id;
            $slot = Cookie::get('goojo_ad_slot');

            //cookies_product
            $CookiesProductModel = new CookiesProduct();

            $cookiesproduct = $CookiesProductModel->where('cookies_uuid',$cookies['uuid'])->where('activity_product_id',$product->activity_product_id)->first();

            if(!isset($cookiesproduct->activity_product_id)){

                $CookiesProductModel->create([
                    'cookies_uuid'=>$cookies['uuid']
                    ,'activity_product_id'=>$product->activity_product_id
                ]);
            }


        }else{
            //非正常请求
            $otherinfo = 'no_info';
            $slot = '';
        }
        
        //
        $this->make($request,$log_type,$product->activity_product_id ,$slot,$pos,$otherinfo);
        
        return response()->json($output);
        
    }
    
    public function shortUrl(Request $request,$short_url){
        
        $request->all();
        
        $original_url = ShortUrlHelper::get($short_url);
        $short_url_code = ShortUrlHelper::getCode($short_url);
        $log_type = 'CLICK';
        
        $pos='0,0';
        
        //$hash_string = sprintf("");
        $cookies = $request->cookie();
        
        if(isset($cookies['uuid'])){
            $otherinfo = 'EXIST_COOKIE:'.$cookies['uuid'].',TARGET:'.$original_url.',SHORT_URL_CODE:'.$short_url_code;
            $slot = Cookie::get('goojo_ad_slot');
        }else{
            //非正常请求
            $otherinfo = 'TARGET:'.$original_url.',SHORT_URL_CODE:'.$short_url_code;
            $slot = '';
        }
        
        //
        $this->make($request,$log_type, 'NOID' ,$slot,$pos,$otherinfo);
        
        return redirect($original_url);
        
    }

    public function myProduct(Request $request){

        $request->all();



        $log_type = 'PRODUCT_SHOW';

        $pos='0,0';

        $cookies = $request->cookie();

        if(isset($cookies['uuid'])){
            $slot = Cookie::get('goojo_ad_slot');

            //cookies_product
            $CookiesProductModel = new CookiesProduct();

            $activity_product_ids = $CookiesProductModel->where('cookies_uuid',$cookies['uuid'])->pluck('activity_product_id');

            $ActivityProductModel = new ActivityProduct();

            $lists = $ActivityProductModel->whereIn('activity_product_id',$activity_product_ids)->get();

            foreach ($lists as &$product){

                $product->object = json_decode($product->activity_product_attribute);
            }

        }else{

            $lists = [];

        }

        return response()->view('request.myproduct' , ['lists'=>$lists]);


    }


    public function showProductDetails(Request $request,$product_id){

        $ActivityProductModel = new ActivityProduct();

        $product = $ActivityProductModel->where('activity_product_id',$product_id)->first();

        $product->object = json_decode($product->activity_product_attribute);

        $time = strtotime($product->object->validity_date);

        $limit = $time - time();
        if($limit>0){
            $limit_day = (int)$limit/86400;
            $limit_day = sprintf("仅剩%d天",$limit_day);
        }else{
            $limit_day = '已过期';
        }
        return response()->view('request.product_detail' , ['limit_day'=>$limit_day,'product'=>$product]);

    }



    //选择产品
    public function selectActivity(Request $request){

        $request->all();

        $request_information = $this->getRequestInformation($request);

        $ActivityModel = new Activity();
        $activitys = $ActivityModel->where('status','1')->get();
        $count = $activitys->count();
        $selected = (int) rand(0,$count) - 1;
        foreach ($activitys as $index => $activity){
            if($index == $selected){

                break;
            }
        }

        return redirect("/activity/".$activity->activity_id);
    }
    
    
}
