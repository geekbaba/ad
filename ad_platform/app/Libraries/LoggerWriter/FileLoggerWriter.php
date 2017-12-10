<?php

namespace App\Libraries\LoogerWriter;

use App\Libraries\LoggerWriter\Log;
class FileLoggerWriter extends Log{

    public static $file_path = '';

    public static $file_dir = '';

    public static function init(){
        self::$file_dir = storage_path().DIRECTORY_SEPARATOR.'logs'.DIRECTORY_SEPARATOR;
    }

    public static function write($log_string){
        
        self::$file_path = self::$file_dir.'AD_PLAT_FORM_'.date('Y_m_d_H',time()).'.log';
        file_put_contents(self::$file_path, $log_string."\n", FILE_APPEND);

    }

    public static function getLoggers(){

        $files = scandir(self::$file_dir);
        $loggers = [];
        foreach ($files as $file){

           if(substr($file,-4)=='.log'){

               $loggers[] = $file;
           }
        }

        return $loggers;
    }

    public static function readLogger($file){
        self::$file_path = self::$file_dir.$file;
        $files = file(self::$file_path);
        return $files;
    }

    public static function loggerOk($file){
        self::$file_path = self::$file_dir.$file;
        rename(self::$file_path, self::$file_path.'.ok');
        return true;
    }


}