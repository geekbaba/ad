<?php

namespace App\Console\Commands;

use App\Libraries\LoogerWriter\LoggerWriter;
use Illuminate\Console\Command;

class journalling extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'journalling';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
            //

        $loggers = LoggerWriter::getLoggers();
        foreach ($loggers as $logger){

            $logs = LoggerWriter::readLogger($logger);

            foreach ($logs as $lineNumber=> $log){
                $this->dealLine($lineNumber,$log);
            }

        }




    }

    protected function dealLine($lineNumber,$line){

        $sp = chr(1).chr(2);
        $lineNumber;
        /**
        $log_string = $data['DATETIME'].self::$sp
            .$data['REQUEST_TIME_FLOAT'].self::$sp
            .$log_type.self::$sp
            .$_id.self::$sp
            .$slot.self::$sp
            .$data['REMOTE_IP'].self::$sp
            .$data['USER_AGENT'].self::$sp
            .$data['COOKIE'].self::$sp
            .$data['HTTP_REFERER'].self::$sp
            .$pos.self::$sp
            .$other;
         */
        $arr = explode($sp,$line);

        dump($arr);

        $DATETIME = $arr[0];
        $REQUEST_TIME_FLOAT = $arr[1];
        $log_type = $arr[2];
        $id = $arr[3];
        $slot = $arr[4];
        $REMOTE_IP = $arr[5];
        $USER_AGENT = $arr[6];
        $COOKIE = $arr[7];
        $HTTP_REFERER = $arr[8];
        $pos = $arr[9];
        $others = $arr[10];

    }
}
