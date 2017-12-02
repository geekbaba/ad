<?php

namespace App\Model;

class ActivitySkin extends CommonModel
{
    //
    protected $table = 'ad_activity_skin';
    
    protected $primaryKey = 'activity_skin_id';
    
    protected $fillable = [
        'activity_skin_name'
        ,'creator'
        ,'modified_by'
        ,'activity_skin_strategy'
        ,'activity_skin_attribute'
        ,'activity_id'
        ,'status'
    ];
    
}
