<?php

namespace App\Libraries\AttachInterface;

abstract class Attach{
    
    abstract static function get($resource);
    abstract static function upload($resource);
    
    
}