<?php

namespace App\Libraries\AttachInterface;

use App\Model\Attach AS AttachModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AttachHelper {
    
     static $attach_mark = '[Attach]:';
     static function getNetPath($resource){
         $hash_key = str_replace(self::$attach_mark, '', $resource);
         return sprintf('/attach/%s',$hash_key);
         
     }
     static function get($resource){
         $hash_key = str_replace(self::$attach_mark, '', $resource);
         $AttachModel = new AttachModel();
         $attach = $AttachModel->where('hash_key',$hash_key)->first();
         return StorageAttachHelper::get($attach);
     }
     
     static function upload($resource){
         $mimeType = $resource->getMimeType();    //资源的媒体类型
         $attr = StorageAttachHelper::upload($resource);
         $user = Auth::user();
         $attr['attach_mime_type'] = $mimeType;
         $attr['creator'] = $user->user_id;
         Log::info('ATTR:'.print_r($attr,true));
         $attach = self::save($attr);
         $attach->hash_key = self::$attach_mark.$attach->hash_key;
         return $attach;
     }
     
     static function save($attr){
         
         $AttachModel = new AttachModel();
         $attach = $AttachModel->create($attr);
         //$attach->attach_id;
         $hash_key = md5(md5($attach->attach_id));
         $attach->hash_key = $hash_key;
         $attach->save();
         Log::info("ATTACH:".print_r($attach,true));
         return $attach;
     }
    
}