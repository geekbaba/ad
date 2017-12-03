<?php

use App\Enum\FrontWidgetType;
use App\Enum\ADWidthHeight;

return [
    /*广告类型*/
    '1' => [
        'FLOAT_ICON'=>[
            'image'=>[
              'type'=>FrontWidgetType::FILE
                ,'name'=>'image'
                ,'display_name'=>'广告图片'
                ,'maxSize'=>'2M'
            ]
            ,'width_height'=>[
                'type'=>FrontWidgetType::SELECT
                ,'name'=>'width_height'
                ,'display_name'=>'图片尺寸'
                ,'options_data'=>'DATA'//API,DATA
                ,'options'=>ADWidthHeight::WH
            ]
            ,'target_url'=>[
                'type'=>FrontWidgetType::TEXT
                ,'name'=>'target_url'
                ,'display_name'=>'目标地址'
                ,'style'=>''
            ]
        ]
    ]

];
