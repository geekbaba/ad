<?php

namespace App\Model;

class AdClickStatistics extends CommonModel
{
    //
    protected $table = 'ad_click_statistics';
    
    protected $primaryKey = 'ad_click_statistics_id';
    
    protected $fillable = [
        'request_day'
        ,'request_hour'
        ,'log_type'
        ,'shorturl'
        ,'count'
        ,'cheat_count'
    ];
    
}
