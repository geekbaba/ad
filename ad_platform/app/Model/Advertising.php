<?php

namespace App\Model;

class Advertising extends CommonModel
{
    //
    protected $table = 'ad_advertising';
    
    protected $primaryKey = 'advertising_id';
    
    protected $fillable = [
        'advertising_name'
        ,'creator'
        ,'modified_by'
        ,'advertising_strategy'
        ,'advertising_attribute'
        ,'advertising_type_id'
        ,'width_height'
        ,'status'
    ];
    
}
