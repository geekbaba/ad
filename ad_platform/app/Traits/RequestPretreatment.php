<?php
namespace App\Traits;

use Illuminate\Http\Request;
use App\Libraries\LoogerWriter\LoggerWriter;

trait RequestPretreatment{
    
    static $sp = null;
    
    public function make(Request $request){
        
        self::$sp = chr(1).chr(2);
        
        
        $log_type = 'CLICK';
        $pos  = '120,213';//展示没有pos click有
        
        $ad_id = '01';//广告ID
        $ct_id = '2121a2e1'; //创意ID
        $pd_id = '102000e1';// 产品ID
        
        
        $ua = $_SERVER['HTTP_USER_AGENT'];
        
        if(isset($_SERVER['HTTP_COOKIE'])){
            $cookie = $_SERVER['HTTP_COOKIE'];
        }else{
            //没有Cookie
            $cookie = 'nocookie';
        }
        
        
        $remote_ip = get_ip();
        
        
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
        
        $log_string = $datetime.self::$sp
        .$request_time_float.self::$sp
        .$log_type.self::$sp
        .$ad_id.self::$sp
        .$remote_ip.self::$sp
        .$ua.self::$sp
        .$cookie.self::$sp
        .$http_referer.self::$sp
        .$pos.self::$sp;
        LoggerWriter::write($log_string);
    }
}