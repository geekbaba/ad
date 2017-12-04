<?php

namespace App\Libraries\ShortUrlInterface;

abstract class ShortUrl{
    
    abstract static function get($short_url);
    
    abstract static function make($original_url);
    
    
}