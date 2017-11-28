<?php

use App\Enum\FrontWidgetType;

return [
    
    '1' => [
        'FLOAT_ICON'=>[
            [
              'type'=>FrontWidgetType::IMAGE_FILE
             ,'name'=>'image'
             ,'maxSize'=>'2M'
            ]
            ,[
              ,'type'=>FrontWidgetType::SELECT
              ,'name'=>'width_height'
                ,'options_data'=>'DATA'//API,DATA
              ,'options'=>[
                  '000000'=>'0x0'
                  ,'0F00F0'=>'100x100'
              ]
            ]
            ,[
                'type'=>FrontWidgetType::TEXT
                ,'name'=>'target_url'
                ,'style'=>''
            ]
            
        ]
    ],

];
