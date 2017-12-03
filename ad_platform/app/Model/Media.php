<?php

namespace App\Model;

class Media extends CommonModel
{
    //
    protected $table = 'media';
    
    protected $primaryKey = 'media_id';
    
    protected $fillable = [
        'media_name'
        ,'creator'
        ,'modified_by'
        ,'media_type_id'
        ,'status'
    ];
    
}
