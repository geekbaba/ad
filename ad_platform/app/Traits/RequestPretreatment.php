<?php
namespace App\Traits;

use Illuminate\Http\Request;
use App\Libraries\LoogerWriter\LoggerWriter;

trait RequestPretreatment{
    
    static $sp = null;
    
    
    public function getRequestInformation(Request $request){
        
        $data = [];
        
        $ua = $_SERVER['HTTP_USER_AGENT'];
        
        $data['USER_AGENT'] = $ua;
        
        if(isset($_SERVER['HTTP_COOKIE'])){
            $cookie = $_SERVER['HTTP_COOKIE'];
        }else{
            //没有Cookie
            $cookie = 'nocookie';
        }
        
        
        $remote_ip = get_ip();
        
        $data['COOKIE'] = $cookie;
        $data['REMOTE_IP'] = $remote_ip;
        
        $request_uri = $_SERVER['REQUEST_URI'];
        //$request_uri = $_SERVER['REQUEST_URI'];
        $request_time_float = $_SERVER['REQUEST_TIME_FLOAT'];
        $request_time = $_SERVER['REQUEST_TIME'];
        
        if(isset($_SERVER['HTTP_REFERER'])){
            $http_referer = $_SERVER['HTTP_REFERER'];
        }else{
            //没有Cookie
            $http_referer = 'noreferer';
        }
        
        $datetime = date('Y-m-d H:i:s',$request_time);
        //human_time:time:AD_SHOW:AD_ID:ip:UA:Cookie:Referer:pos
        //
        $data['REQUEST_URI'] = $request_uri;
        $data['HTTP_REFERER'] = $http_referer;
        $data['REQUEST_TIME'] = $request_time;
        $data['REQUEST_TIME_FLOAT'] = $request_time_float;
        $data['DATETIME'] = $datetime;
        
        return $data;
    }
    
    public function make(Request $request){
        
        $data = $this->getRequestInformation($request);
        
        self::$sp = chr(1).chr(2);
        
        
        $log_type = 'CLICK';
        $pos  = '120,213';//展示没有pos click有
        
        $ad_id = '01';//广告ID
        $ct_id = '2121a2e1'; //创意ID
        $pd_id = '102000e1';// 产品ID
        
        
        
        //human_time:time:AD_SHOW:AD_ID:ip:UA:Cookie:Referer:pos
        //
        
        $log_string = $data['DATETIME'].self::$sp
        .$data['REQUEST_TIME_FLOAT'].self::$sp
        .$log_type.self::$sp
        .$ad_id.self::$sp
        .$data['REMOTE_IP'].self::$sp
        .$data['USER_AGENT'].self::$sp
        .$data['COOKIE'].self::$sp
        .$data['HTTP_REFERER'].self::$sp
        .$pos.self::$sp;
        LoggerWriter::write($log_string);
    }
}