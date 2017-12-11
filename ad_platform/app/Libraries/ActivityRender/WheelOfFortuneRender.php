<?php 
namespace App\Libraries\ActivityRender;


use App\Libraries\ActivityRenderInterface;
class WheelOfFortuneRender extends ActivityRenderInterface{
    
    
    static function render($activity,$skin){
        
        //
        $activity->activity_name;
        
        $activity_attribute = json_decode($activity->activity_attribute);


        $skin_attribute = json_decode($skin->activity_skin_attribute);

        $main_background_image = $skin_attribute->main_background_image;
        if(isset($skin_attribute->banner_image)){
            $banner_image = $skin_attribute->banner_image;
        }else{
            $banner_image = '';
        }

        return [
            'template'=>'render.activity.0001'
            ,'data'=>[
                'title'=>$activity->activity_name
                ,'main_background_image'=>$main_background_image
                ,'banner_image'=>$banner_image
            ]
        ];
    }
    
}