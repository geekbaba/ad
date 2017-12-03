<?php 
namespace App\Libraries\AdSelector;


use App\Libraries\SelectorInterface;
use App\Model\Advertising;

class MysqlSelector extends SelectorInterface{
    
    
    static function select($attr){
        
        //$attr['width'];
        //$attr['height'];
        
        $width_height = padzero_dechex($attr['width'], 3).padzero_dechex($attr['height'], 3);
        
        $AdvertisingModel = new Advertising();
        
        $advertisings = $AdvertisingModel->where('width_height',$width_height)->get();
        
        foreach ($advertisings as $advertising){
            
            
            return $advertising;
        }
        
        return [];
    }
    
}