<?php

namespace App\Libraries\AttachInterface;

use Illuminate\Support\Facades\Log;

class StorageAttachHelper extends Attach{
    
     static $api = 'file_storage';
     
     static function get($attach){
         //file_get_contents($resource);
         $attach->attach_relative_src;
         $attach->attach_mime_type;
         $attach->attach_api;
         ['Content-Type' => $attach->attach_mime_type];
         return $attach;
     }
     
     static function upload($resource){
         
         $clientName = $resource->getClientOriginalName();    //客户端文件名称..
         $tmpName = $resource->getFileName();                 //缓存在tmp文件夹中的文件名
         $realPath = $resource->getRealPath();                //这个表示的是缓存在tmp文件夹下的文件的绝对路径
         
         $entension = $resource->getClientOriginalExtension();   //上传文件的后缀.
         //$mimeTye = $resource->getMimeType();                    //也就是该资源的媒体类型
         
         $newFileName = date('ymdhis').$clientName;    //定义上传文件的新名称
         $path = $resource->move('storage/uploads',$newFileName);    //把缓存文件移动到制定文件夹
         //print_r($path);die;
         Log::info("path:".$path);
         $attr = [];
         $attr['attach_relative_src'] = $path;
         $attr['attach_host'] = '';
         $attr['attach_info'] = '';
         $attr['attach_api'] = self::$api;
         $attr['status'] = 1;
         return $attr;
     }
    
}