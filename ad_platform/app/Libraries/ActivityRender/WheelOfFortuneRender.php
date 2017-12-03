<?php 
namespace App\Libraries\ActivityRender;


use App\Libraries\ActivityRenderInterface;
class WheelOfFortuneRender extends ActivityRenderInterface{
    
    
    static function render($activity){
        
        //
        $activity->activity_name;
        
        $activity_attribute = json_decode($activity->activity_attribute);
        
        return [
            'template'=>'render.activity.0001'
            ,'data'=>[
                'title'=>$activity->activity_name
                ,''=>''
            ]
        ];
    }
    
}