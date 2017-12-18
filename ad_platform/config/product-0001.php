<?php

use App\Enum\FrontWidgetType;
use App\Enum\MIMEType;

return [
        'name'=>"产品模板"
        ,'js'=>[
            
        ]
        ,'htmls'=>[
            
        ]
    ,'attribute' => [
            'product_image'=>[
                'type'=>FrontWidgetType::IMAGE
                ,'name'=>'product_image'
                ,'display_name'=>'产品图片'
                ,'mime'=>MIMEType::IMAGE
                ,'maxSize'=>'2M'
                ,'width'=>640
                ,'height'=>300
            ]
            ,'product_list_image'=>[
                    'type'=>FrontWidgetType::IMAGE
                    ,'name'=>'product_list_image'
                    ,'display_name'=>'列表LOGO图'
                    ,'mime'=>MIMEType::IMAGE
                    ,'maxSize'=>'2M'
                    ,'width'=>225
                    ,'height'=>140
            ]
        ,'description'=>[
            'type'=>FrontWidgetType::TEXT_AREA
            ,'name'=>'description'
            ,'display_name'=>'图文详情'
            ,'maxSize'=>'2M'
        ]
        ,'user_manual'=>[
            'type'=>FrontWidgetType::TEXT_AREA
            ,'name'=>'user_manual'
            ,'display_name'=>'使用流程'
            ,'maxSize'=>'2M'
        ]
        ,'rules'=>[
            'type'=>FrontWidgetType::TEXT_AREA
            ,'name'=>'rules'
            ,'display_name'=>'使用规则'
            ,'maxSize'=>'2M'
        ]
        ,'button_name'=>[
            'type'=>FrontWidgetType::TEXT
            ,'name'=>'button_name'
            ,'display_name'=>'按钮文字'
        ]
        ,'target_url'=>[
            'type'=>FrontWidgetType::TEXT
            ,'name'=>'target_url'
            ,'display_name'=>'目标地址'
        ]
        ,'validity_date'=>[
            'type'=>FrontWidgetType::DATE
            ,'name'=>'validity_date'
            ,'display_name'=>'有效期'
        ]
    ]
];
