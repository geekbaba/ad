<?php

namespace App\Model;

class CookiesProduct extends CommonModel
{
    //
    protected $table = 'cookies_product';
    
    //protected $primaryKey = 'cookies_uuid';
    
    protected $fillable = [
        'cookies_uuid'
        ,'activity_product_id'
    ];
    
}
