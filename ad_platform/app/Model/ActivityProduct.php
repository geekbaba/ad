<?php

namespace App\Model;

class ActivityProduct extends CommonModel
{
    //
    protected $table = 'ad_activity_product';
    
    protected $primaryKey = 'activity_product_id';
    
    protected $fillable = [
        
        'activity_product_name'
        ,'creator'
        ,'modified_by'
        ,'activity_product_strategy'
        ,'activity_product_attribute'
        ,'status'
    ];
    
}
