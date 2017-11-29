<?php

use App\Enum\FrontWidgetType;

return [
    /*广告类型*/
    '1' => [
        'FLOAT_ICON'=>[
            [
              'type'=>FrontWidgetType::FILE
                ,'name'=>'image'
                ,'display_name'=>'广告图片'
                ,'maxSize'=>'2M'
            ]
            ,[
                'type'=>FrontWidgetType::SELECT
                ,'name'=>'width_height'
                ,'display_name'=>'图片尺寸'
                ,'options_data'=>'DATA'//API,DATA
              ,'options'=>[
                  '000000'=>'0x0'
                  ,'0F00F0'=>'100x100'
              ]
            ]
            ,[
                'type'=>FrontWidgetType::TEXT
                ,'name'=>'target_url'
                ,'display_name'=>'目标地址'
                ,'style'=>''
            ]
            
        ]
    ]

];
