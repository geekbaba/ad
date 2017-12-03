<?php 
namespace App\Libraries\AdRender;


use App\Libraries\AdRenderInterface;
use App\Traits\WidthHeightMaker;
class WapRender extends AdRenderInterface{
    
    use WidthHeightMaker;
    
    static function render($ad){
        
        //
        
        $attr = json_decode($ad->advertising_attribute);
        $ad->width_height;
        
        $image_src = sprintf('/[Attach]:%s',$attr->image);
        
        $width_height = self::extract($ad->width_height);
        $width = $width_height['width'];
        $height = $width_height['height'];;
        $target_url = $attr->target_url;
        
        return [
            'template'=>'render.ad.wap'
            ,'data'=>[
                'width'=>$width
                ,'height'=>$height
                ,'target_url'=>$target_url
                ,'image_src'=>$image_src
            ]
        ];
    }
    
}