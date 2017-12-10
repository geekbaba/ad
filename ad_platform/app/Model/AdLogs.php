<?php

namespace App\Model;

class AdLogs extends CommonModel
{
    //
    protected $table = 'ad_logs';
    
    protected $primaryKey = 'log_id';
    
    protected $fillable = [
        'request_time'
        ,'request_time_float'
        ,'log_type'
        ,'object_id'
        ,'ad_slot'
        ,'remote_ip'
        ,'user_agent'
        ,'cookies'
        ,'http_referer'
        ,'pos'
        ,'others'
        ,'logger'
        ,'line'

    ];
    
}
