<?php

use App\Enum\FrontWidgetType;
use App\Enum\MIMEType;

return [
        'name'=>"刮刮乐模板"
        ,'js'=>[
        ]
        ,'htmls'=>[
            
        ]
        ,'attribute' => [
            'main_background_image'=>[
              'type'=>FrontWidgetType::IMAGE
                ,'name'=>'main_background_image'
                ,'display_name'=>'主背景图片'
                ,'mime'=>MIMEType::IMAGE
                ,'maxSize'=>'2M'
                ,'width'=>640
                ,'height'=>1008
            ]
            ,'banner_image'=>[
                'type'=>FrontWidgetType::IMAGE
                ,'name'=>'banner_image'
                ,'display_name'=>'banner图片'
                ,'mime'=>MIMEType::IMAGE
                ,'maxSize'=>'2M'
                ,'width'=>750
                ,'height'=>258
            ]
        ]
];
