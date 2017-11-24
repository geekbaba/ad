<?php

namespace App\Libraries\LoogerWriter;

use App\Libraries\LoggerWriter\Log;
class FileLoggerWriter extends Log{
    
    public static $file_path = '';
    
    public static function write($log_string){
        
        self::$file_path = storage_path().DIRECTORY_SEPARATOR.'logs'.DIRECTORY_SEPARATOR.'AD_PLAT_FORM_'.date('Y_m_d_H',time()).'.log';
        file_put_contents(self::$file_path, $log_string."\n", FILE_APPEND);
    }
    
}