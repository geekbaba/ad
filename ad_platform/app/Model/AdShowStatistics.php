<?php

namespace App\Model;

class AdShowStatistics extends CommonModel
{
    //
    protected $table = 'ad_show_statistics';
    
    protected $primaryKey = 'ad_show_statistics_id';
    
    protected $fillable = [
        'request_day'
        ,'request_hour'
        ,'log_type'
        ,'object_id'
        ,'count'
        ,'cheat_count'
    ];
    
}
