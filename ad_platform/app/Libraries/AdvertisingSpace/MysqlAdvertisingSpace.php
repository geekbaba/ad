<?php 
namespace App\Libraries\AdvertisingSpace;


use App\Libraries\AdvertisingSpaceInterface;
use App\Model\AdvertisingSpace;

class MysqlAdvertisingSpace extends AdvertisingSpaceInterface{
    
    
    static function getAttr($advertising_space_id){
        $AdvertisingSpaceModel = new AdvertisingSpace();
        $advertising_space = $AdvertisingSpaceModel->where('advertising_space_id',$advertising_space_id)->first();
        
        $advertising_space_attribute = json_decode($advertising_space->advertising_space_attribute);
        
        $width_height = $advertising_space_attribute->width_height;
        
        $hex_width = substr($width_height, 0,3);
        
        $hex_height = substr($width_height, -3);
        
        $width = $hex_width=='' ? 0 : hexdec($hex_width);
        
        $height = $hex_height=='' ? 0 : hexdec($hex_height);
        
        return [
            'width'=>$width
            ,'height'=>$height
            ,'advertising_space_id'=>$advertising_space->advertising_space_id
            ,'media_id'=>$advertising_space->media_id
            ,'advertising_type_id'=>$advertising_space->advertising_type_id
        ];
        
    }
    
}