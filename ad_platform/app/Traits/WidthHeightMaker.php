<?php
namespace App\Traits;


trait WidthHeightMaker{
    
    
    
    public static function extract($width_height){
        
        $hex_width = substr($width_height, 0,3);
        $hex_height = substr($width_height, -3);
        
        return [
            'width'=>hexdec($hex_width)
            ,'height'=>hexdec($hex_height)
        ];
    }
    
    
    public static function make($width,$height){
        return padzero_dechex($width, 3).padzero_dechex($height, 3);
    }
}