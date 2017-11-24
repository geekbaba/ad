<?php

namespace App\Libraries\LoogerWriter;

class LoggerWriter{
    
    
    public static function write($log_string){
        FileLoggerWriter::write($log_string);
    }
}