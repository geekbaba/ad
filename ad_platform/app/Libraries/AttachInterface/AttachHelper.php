<?php

namespace App\Libraries\AttachInterface;

use App\Model\Attach AS AttachModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Enum\MIMEType;

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
     
     /**
      * @todo 可以写一个input或者post verification方法封装在前
      * 附件验证专注于处理附件验证、数据验证专注与处理数据问题
      * @param mixed $resource
      * @param array $configure
      */
     static function verification($resource,$configure){
         //'type'=>FrontWidgetType::IMAGE
         //,'name'=>'main_background_image'
         //,'display_name'=>'主背景图片'
         //,'mime'=>['image/jpeg','image/png']
         //,'maxSize'=>'2M'
         //,'width'=>'750'
         //,'height'=>'1206'
         $mimeType = $resource->getMimeType();    //资源的媒体类型
         
         if(!in_array($mimeType, $configure['mime'])){
             throw new \Exception("附件类型错误!");
         }
         
         if(isset($configure['width']) || isset($configure['height'])){
             
             if(in_array($mimeType, MIMEType::IMAGE)){
                 $imagesize = getimagesize( $resource->getRealPath());
                 //$imagesize[0];
                 //$imagesize[1];
                 if(isset($configure['width']) && $configure['width']!=$imagesize[0]){
                     throw new \Exception("图片尺寸要求尺寸不符合!");
                 }
                 
                 if(isset($configure['height']) && $configure['height']!=$imagesize[1]){
                     throw new \Exception("图片尺寸要求尺寸不符合!}");
                 }
             }else{
                 throw new \Exception("附件类型非图片类型，无法处理尺寸验证!");
             }
         }
         
         
         return true;
         //,'options_data'=>'DATA'//API,DATA
         //,'options'=>[
         //    '000000'=>'0x0'
         //    ,'0F00F0'=>'100x100'
         // ]
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