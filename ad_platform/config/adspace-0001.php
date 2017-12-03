<?php

use App\Enum\FrontWidgetType;
use App\Enum\MIMEType;
use App\Enum\ADWidthHeight;

return [
        'name'=>"APP广告位"
        ,'js'=>[
            
        ]
        ,'htmls'=>[
            
        ]
    ,'attribute' => [
            'width_height'=>[
                'type'=>FrontWidgetType::SELECT
                ,'name'=>'width_height'
                ,'display_name'=>'图片尺寸'
                ,'options_data'=>'DATA'//API,DATA
                ,'options'=>ADWidthHeight::WH
            ]
            ,'description'=>[
                'type'=>FrontWidgetType::TEXT_AREA
                ,'name'=>'description'
                ,'display_name'=>'描述'
                ,'maxSize'=>'2M'
            ]
            ,'validity_date'=>[
                'type'=>FrontWidgetType::DATE
                ,'name'=>'validity_date'
                ,'display_name'=>'有效期'
            ]
    ]
];
