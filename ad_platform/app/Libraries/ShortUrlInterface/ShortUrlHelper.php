<?php

namespace App\Libraries\ShortUrlInterface;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class ShortUrlHelper {
    
     
     static function get($short_url){
         
         $short_url = self::getCode($short_url);

         return MysqlShortUrlHelper::get($short_url);
     }

    static function getCode($short_url){

        $uri = Config::get('services.shorturl.uri');

        $short_url = str_replace($uri, '', $short_url);

        return $short_url;
    }
    /**
     * 
     * @param string $original_url original_url
     */
     static function make($original_url,$type){
         
         $user = Auth::user();
         
         $attr = [];
         
         $attr['status'] = 1;
         
         $attr['original_url'] = $original_url;

         $attr['creator'] = $user->user_id;
         $attr['type'] = $type;

         $shortUrl = MysqlShortUrlHelper::make($attr);
         $uri = Config::get('services.shorturl.uri');
         return $uri.$shortUrl->shorturl;
     }
     
}