<?php

namespace App\Model;

class AdvertisingSpace extends CommonModel
{
    //
    protected $table = 'media_advertising_space';
    
    protected $primaryKey = 'advertising_space_id';
    
    protected $fillable = [
        'advertising_space_id'
        ,'advertising_space_name'
        ,'creator'
        ,'modified_by'
        ,'advertising_space_strategy'
        ,'advertising_space_attribute'
        ,'advertising_type_id'
        ,'media_id'
        ,'advertising_space_code'
        ,'status'
    ];
    
}
