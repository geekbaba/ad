<?php
namespace App\Traits;

use Illuminate\Http\Request;
use App\Libraries\LoogerWriter\LoggerWriter;

trait RequestPretreatment{
    
    static $sp = null;
    
    public function getCookiesString(Request $request){
        $cookies = $request->cookie();
        
        $cookieBoxs = [];
        
        foreach ($cookies as $key=>$value){
            $cookieBoxs[] = $key.':'.$value;
        }
        $cookie_string = implode(',', $cookieBoxs);
        
        return $cookie_string;
    }
    
    public function getRequestInformation(Request $request){
        
        $data = [];
        
        $ua = $_SERVER['HTTP_USER_AGENT'];
        
        $data['USER_AGENT'] = $ua;
        
        if(isset($_SERVER['HTTP_COOKIE'])){
            
            //$cookie = $_SERVER['HTTP_COOKIE'];
            $cookie = $this->getCookiesString($request);
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
    
    public function make(Request $request,$log_type,$_id,$slot,$pos='0,0',$other='no_info'){
        
        $data = $this->getRequestInformation($request);
        
        self::$sp = chr(1).chr(2);
        
        
        //human_time:time:AD_SHOW:AD_ID:ip:UA:Cookie:Referer:pos
        //
        
        $log_string = $data['DATETIME'].self::$sp
        .$data['REQUEST_TIME_FLOAT'].self::$sp
        .$log_type.self::$sp
        .$_id.self::$sp
        .$slot.self::$sp
        .$data['REMOTE_IP'].self::$sp
        .$data['USER_AGENT'].self::$sp
        .$data['COOKIE'].self::$sp
        .$data['HTTP_REFERER'].self::$sp
        .$pos.self::$sp
        .$other;
        LoggerWriter::write($log_string);
    }
}