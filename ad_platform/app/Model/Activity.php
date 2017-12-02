<?php

namespace App\Model;

class Activity extends CommonModel
{
    //
    protected $table = 'ad_activity';
    
    protected $primaryKey = 'activity_id';
    
    protected $fillable = [
        'activity_name'
        ,'creator'
        ,'modified_by'
        ,'activity_strategy'
        ,'activity_attribute'
        ,'skin_configure_code'
        ,'status'
    ];
    
}
