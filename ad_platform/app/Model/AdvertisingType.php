<?php

namespace App\Model;

class AdvertisingType extends CommonModel
{
    //
    protected $table = 'ad_advertising_type';
    
    protected $primaryKey = 'advertising_type_id';
    
    protected $fillable = [
        'advertising_type_name'
        ,'creator'
        ,'modified_by'
        ,'status'
    ];
    
}
