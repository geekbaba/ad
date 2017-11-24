<?php 
namespace App\Libraries\AdvertisingSpace;


use App\Libraries\AdvertisingSpaceInterface;
use App\Model\AdvertisingSpace;

class MysqlAdvertisingSpace extends AdvertisingSpaceInterface{
    
    
    static function getAttr($advertising_space_id){
        $AdvertisingSpaceModel = new AdvertisingSpace();
        $advertising_space = $AdvertisingSpaceModel->where('advertising_space_id',$advertising_space_id)->first();
        
        $advertising_space_attribute = json_decode($advertising_space->advertising_space_attribute);
        
        return [
            'width'=>$advertising_space_attribute->width
            ,'height'=>$advertising_space_attribute->height
            ,'advertising_space_id'=>$advertising_space->advertising_space_id
            ,'media_id'=>$advertising_space->media_id
            ,'advertising_space_type_id'=>$advertising_space->advertising_space_type_id
        ];
        
    }
    
}