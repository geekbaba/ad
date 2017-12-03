<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libraries\AdSelector\Selector;
use App\Libraries\ProductSelector\Selector as ProductSelector;
use App\Libraries\AdvertisingSpace\Slot;
use App\Traits\RequestPretreatment;
use App\Libraries\AdRender\Render;
use \App\Libraries\ActivityRender\Render as ActivityRender;
use App\Model\Activity;

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
        
        return response()->view($render['template'],$render['data']);
    }
    
    
    public function showActivity($activity_id){
        $ActivityModel = new Activity();
        $activity = $ActivityModel->where('activity_id',$activity_id)->first();
        
        $render = ActivityRender::render($activity);
        
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
        return response()->json($output);
        
    }
    
    
}
