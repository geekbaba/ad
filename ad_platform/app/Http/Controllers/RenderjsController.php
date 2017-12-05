<?php

namespace App\Http\Controllers;


use App\Libraries\AdvertisingSpace\Slot;
use App\Model\Activity;
use Illuminate\Http\Request;
use App\Model\ActivitySkin;
use Illuminate\Support\Facades\DB;
use App\Traits\RequestPretreatment;

class RenderjsController extends Controller
{
    /**
     * 广告位展示请求
     */
    use RequestPretreatment;
    
    public function index(Request $request,$slot){
        
        //view('loader')->html
        //$content = file_get_contents();
        //需要修改
        //Content-Type:
        //header('Content-Type:application/javascript');
        $data = Slot::extract($slot);
        
        $analytics_server = 'http://45.121.142.80/analytics/';
        $ssl_analytics_server = 'https://45.121.142.80/ssl_analytics/';
        $ad_server = 'http://45.121.142.80/gad/';
        
        $adspace['adsp_id'] = $data['advertising_space_id'];
        
        $adspace['width'] = $data['width'];
        
        $adspace['height'] = $data['height'];
        $adspace['ad_server'] = $ad_server;
        
        $log_type = 'ADS_REQ';
        
        $pos='0,0';
        //
        //
        $this->make($request,$log_type,$adspace['adsp_id'],$slot,$pos);
        
        return response()->view('loader',['ssl_analytics_server'=>$ssl_analytics_server,'analytics_server'=>$analytics_server,'adspace'=>json_encode($adspace)])
        ->header('Content-Type', 'application/javascript');
        
        //->cookie($name, $value, $minutes, $path, $domain, $secure, $httpOnly)
        //echo $content;die;
        
    }
    
    public function activityJs(Request $request,$activity_id){
        $ActivityModel = new Activity();
        
        $activity = $ActivityModel->where('activity_id',$activity_id)->first();
        
        $ActivitySkinModel  = new ActivitySkin();
        
        $activity_skin_ids = $ActivitySkinModel->where('activity_id',$activity_id)->pluck('activity_skin_id');
        //$activity_skin_ids = DB::table('ad_activity_skin')->where('activity_id',$activity_id)->list('activity_skin_id');
        if(is_array($activity_skin_ids)){
            $count = count($activity_skin_ids);
        }else{
            $count = $activity_skin_ids->count();
        }
        $rand = rand(0,$count);
        if(isset($activity_skin_ids[$rand])){
            $skin_id = $activity_skin_ids[$rand];
        }else{
            $skin_id = $activity_skin_ids[0];
        }
        
        $activity_skin = $ActivitySkinModel->where('activity_skin_id',$skin_id)->first();
        
        $skin_configure_code = $activity->skin_configure_code;
        
        return response()->view('activity_js.'.$skin_configure_code,['activity_id'=>$activity_id,'activity_skin'=>$activity_skin])->header('Content-Type', 'application/javascript');
        
    }
    
    
}
