<?php

namespace App\Model;

class Attach extends CommonModel
{
    //
    protected $table = 'ad_attach';
    
    protected $primaryKey = 'attach_id';
    
    protected $fillable = [
        'attach_mime_type'
        ,'creator'
        ,'modified_by'
        ,'attach_relative_src'
        ,'attach_info'
        ,'attach_host'
        ,'attach_api'
        ,'status'
        ,'hash_key'
    ];
    
}
