<?php

namespace App\Console\Commands;

use App\Libraries\LoogerWriter\LoggerWriter;
use App\Model\AdClickStatistics;
use App\Model\AdLogs;
use App\Model\AdShowStatistics;
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

    protected $count = 0;

    protected $mem = [];
    protected $batchMaxCount = 2000;

    private $separator = '-';

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
                $this->count++;
                $lineNumber = $indexer + 1;
                $this->dealLine($logger,$lineNumber,$log);
            }

            LoggerWriter::loggerOk($logger);

        }

        $this->dealMem();


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



        //时间处理
        //$DATETIME;
        $t = (int)$REQUEST_TIME_FLOAT;

        $Ymd = date('Ymd',$t);
        $H = date('H',$t);


        $loggerType = 0;

        switch ($log_type){
            case 'ADS_REQ':
                //广告位请求
                $loggerType =1;
                $key = $Ymd.$this->separator.$H.$this->separator.$log_type.$this->separator.(int)$id;

                break;
            case 'QUERY_AD':
                //广告展示
                $loggerType =2;
                $key = $Ymd.$this->separator.$H.$this->separator.$log_type.$this->separator.(int)$id;

                break;

            case 'ACTIVITY_JS_REQ':
                //活动请求
                $loggerType =3;
                $key = $Ymd.$this->separator.$H.$this->separator.$log_type.$this->separator.(int)$id;

                break;

            case 'ACTIVITY_SHOW':
                //活动展示
                $loggerType =4;
                $key = $Ymd.$this->separator.$H.$this->separator.$log_type.$this->separator.(int)$id;

                break;
            case 'PRODUCT_SHOW':
                //产品展示
                $loggerType =5;

                //2
                $key = $Ymd.$this->separator.$H.$this->separator.$log_type.$this->separator.(int)$id;

                break;

            case 'CLICK':
                //点击统计
                $loggerType =6;
                $SHORT_URL_CODE = $attrs['SHORT_URL_CODE'];
                $key = $Ymd.$this->separator.$H.$this->separator.$log_type.$this->separator.$SHORT_URL_CODE;

                break;
            default:

                break;
        }

        if(isset($this->mem[$key])){
            $this->mem[$key]++;
        }else{
            $this->mem[$key] = 1;
        }

        if($this->count >= $this->batchMaxCount){

            $this->dealMem();
        }

    }

    private function dealMem(){

       $AdClickStatisticsModel = new AdClickStatistics();
       $AdShowStatisticsModel = new AdShowStatistics();

        $this->mem;
        foreach ($this->mem as $key=>$count){
            $attr = explode($this->separator,$key);
            $ymd = $attr[0];
            $h = $attr[1];
            $log_type = $attr[2];
            $id = $attr[3];
            //$key = $Ymd.'_'.$H.'_'.$log_type.'_'.(int)$id;
            if($log_type=='CLICK'){

                $exists = $AdClickStatisticsModel->where('request_day',$ymd)
                    ->where('request_hour',$h)->where('log_type',$log_type)
                    ->where('shorturl',$id)->first();

                if(isset($exists->ad_click_statistics_id)){

                    $exists->count = $exists->count + $count;
                    $exists->save();

                }else{

                    $data = [
                        'request_day'=>$ymd
                        ,'request_hour'=>$h
                        ,'log_type'=>$log_type
                        ,'shorturl'=>$id
                        ,'count'=>$count
                        ,'cheat_count'=>0
                    ];

                    $AdClickStatisticsModel->create($data);

                }

            }else{


                $exists = $AdShowStatisticsModel->where('request_day',$ymd)
                    ->where('request_hour',$h)->where('log_type',$log_type)
                    ->where('object_id',$id)->first();

                if(isset($exists->ad_show_statistics_id)){

                    $exists->count = $exists->count + $count;
                    $exists->save();

                }else{

                    $data = [
                        'request_day'=>$ymd
                        ,'request_hour'=>$h
                        ,'log_type'=>$log_type
                        ,'object_id'=>$id
                        ,'count'=>$count
                        ,'cheat_count'=>0
                    ];

                    $AdShowStatisticsModel->create($data);

                }

            }
            //statistics
        }

        $this->mem = [];
    }
}
