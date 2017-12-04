<?php

namespace App\Libraries\ShortUrlInterface;


use App\Model\ShortUrl as ShortUrlModel;

class MysqlShortUrlHelper extends ShortUrl{
    
     
     static function get($short_url){
         $ShortUrlModel = new ShortUrlModel();
         $shortUrl = $ShortUrlModel->where('shorturl',$short_url)->first();
         if($shortUrl){
             return $shortUrl->original_url;
         }
         return '';
     }
     
     static function make($attr){
         
         $ShortUrlModel = new ShortUrlModel();
         
         $hash_key = md5(md5($attr['original_url']));
         
         $shortUrl = $ShortUrlModel->where('hash_key',$hash_key)->first();
         
         if(empty($shortUrl)){
             $shortUrl = $ShortUrlModel->create($attr);
             
             $hash = md5(md5($shortUrl->shorturl_id));
             
             $key = substr($hash, 2,10);
             
             $shortUrl->shorturl = $key;
             $shortUrl->hash_key = $hash_key;
             $shortUrl->save();
         }
         
         return $shortUrl;
     }
    
}