<?php

namespace App\Model;

class CookiesMap extends CommonModel
{
    //
    protected $table = 'cookies_map';
    
    protected $primaryKey = 'cookies_map_id';
    
    protected $fillable = [
        'cookies_uuid'
        ,'status'
        ,'cookies'
        ,'advertising_space_id'
        ,'slot'
    ];
    
}
