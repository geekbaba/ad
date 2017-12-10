<?php

namespace App\Model;

class ShortUrl extends CommonModel
{
    //
    protected $table = 'shorturl';
    
    protected $primaryKey = 'shorturl_id';
    
    protected $fillable = [
        'creator'
        ,'modified_by'
        ,'original_url'
        ,'shorturl'
        ,'status'
        ,'hash_key'
        ,'type'
    ];
    
}
