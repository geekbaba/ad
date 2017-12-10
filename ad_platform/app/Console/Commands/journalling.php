<?php

namespace App\Console\Commands;

use App\Libraries\LoogerWriter\LoggerWriter;
use App\Model\AdLogs;
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

            if(substr($logger,0,2)!='AD'){
                continue;
            }

            $logs = LoggerWriter::readLogger($logger);

            foreach ($logs as $indexer=> $log){
                $lineNumber = $indexer + 1;
                $this->dealLine($logger,$lineNumber,$log);
            }

        }




    }

    protected function dealLine(&$logger,&$lineNumber,$line){

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

        $AdLogsModel = new AdLogs();


        $isExistLog = $AdLogsModel->where('logger',$logger)->where('line',$lineNumber)->first();
        if(!isset($isExistLog->log_id)){

            $data = [
                'request_time'=>$DATETIME
                ,'request_time_float'=>$REQUEST_TIME_FLOAT
                ,'log_type'=>$log_type
                ,'object_id'=>(int)$id
                ,'ad_slot'=>$slot
                ,'remote_ip'=>$REMOTE_IP
                ,'user_agent'=>$USER_AGENT
                ,'cookies'=>$COOKIE
                ,'http_referer'=>$HTTP_REFERER
                ,'pos'=>$pos
                ,'others'=>$others
                ,'logger'=>$logger
                ,'line'=>$lineNumber
            ];

            $AdLogsModel->create($data);
        }


        $loggerType = 0;

        switch ($log_type){
            case 'ADS_REQ':

                $loggerType =1;

                break;
            case 'QUERY_AD':

                $loggerType =2;

                break;

            case 'ACTIVITY_SHOW':

                $loggerType =3;

                break;
            case 'PRODUCT_SHOW':

                $loggerType =4;

                break;

            case 'CLICK':

                $loggerType =5;

                break;
            default:

                break;
        }


        $COOKIE_ITEMS = explode(',',$COOKIE);

        $COOKIE_ATTRS = [];
        foreach ($COOKIE_ITEMS as $item){

            $info = explode(':',$item);

            if(isset($info[1])) {
                $key = $info[0];
                $value = $info[1];
                $COOKIE_ATTRS[$key] = $value;
            }
        }

        $others_attr = explode(',',$others);

        $attrs = [];

        foreach ($others_attr as $item){

            $info = explode(':',$item);

            if(isset($info[1])){
                $key = $info[0];
                $value = $info[1];
                $attrs[$key] = $value;
            }

        }


    }
}
