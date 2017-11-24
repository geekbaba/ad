<?php

namespace App\Libraries\LoggerWriter;

abstract class Log{
    
    abstract static function write($log_string);
    
}