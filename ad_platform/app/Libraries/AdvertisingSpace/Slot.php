<?php 
namespace App\Libraries\AdvertisingSpace;

class Slot{
    
    
    static function extract($slot){
        $parts = explode('-', $slot);
        $advertising_type_id = hexdec(substr($parts[0], 0,3));
        $width = hexdec(substr($parts[0], 3,3));
        $height = hexdec(substr($parts[0], -3));
        
        $media_id = hexdec($parts[1]);
        $advertising_space_id = hexdec($parts[2]);
        
        $data = [];
        $data['advertising_type_id'] = $advertising_type_id;
        $data['width'] = $width;
        $data['height'] = $height;
        $data['media_id'] = $media_id;
        $data['advertising_space_id'] = $advertising_space_id;
        
        return $data;
    }
    static function maker($advertising_type_id,$width,$height,$media_id,$advertising_space_id){
        
        //FFF FFF FFF   -     FFFF - FFFFFFFF
        //广告位类型 + 宽 + 高  - 媒体ID - 广告位ID
        $slot = sprintf('%s%s%s-%s-%s'
            ,padzero_dechex($advertising_type_id, 3)
            ,padzero_dechex($width, 3)
            ,padzero_dechex($height, 3)
            ,padzero_dechex($media_id, 4)
            ,padzero_dechex($advertising_space_id, 8)
            );
        return $slot;
    }
    
}