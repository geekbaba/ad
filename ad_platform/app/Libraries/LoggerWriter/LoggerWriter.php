<?php

namespace App\Libraries\LoogerWriter;

class LoggerWriter{
    
    
    public static function write($log_string){
        FileLoggerWriter::init();
        FileLoggerWriter::write($log_string);
    }

    public static function getLoggers(){
        FileLoggerWriter::init();
        return FileLoggerWriter::getLoggers();
    }

    public static function readLogger($file){
        FileLoggerWriter::init();
        return FileLoggerWriter::readLogger($file);
    }

    public static function loggerOk($file){
        FileLoggerWriter::init();
        return FileLoggerWriter::loggerOk($file);
    }

}