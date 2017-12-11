<?php

namespace App\Http\Controllers;


use App\Model\ActivityProduct;
use App\Model\Advertising;
use App\Model\AdvertisingSpace;
use App\Model\ShortUrl;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Activity;


class StatisticsController extends WithAuthController
{
    
    public function showHourStatisticsList(Request $request){

        $all = $request->all();
        $type = $all['type'];

        $list = DB::table('ad_show_statistics')->where('log_type',$type)->orderBy('created_at')->paginate(5);


        switch ($type){
            case 'ADS_REQ':
                //广告位请求
                $model = new AdvertisingSpace();
                $title = "广告位报表";
                $primary_key = 'advertising_space_id';
                $name = 'advertising_space_name';

                break;
            case 'QUERY_AD':
                //广告展示
                $model = new Advertising();
                $title = "广告展示报表";
                $primary_key = 'advertising_id';
                $name = 'advertising_name';

                break;

            case 'ACTIVITY_JS_REQ':
                //活动请求
                $model = new Activity();

                break;

            case 'ACTIVITY_SHOW':
                //活动展示
                $model = new Activity();
                $title = "活动展示报表";
                $primary_key = 'activity_id';
                $name = 'activity_name';

                break;
            case 'PRODUCT_SHOW':
                //产品展示
                $model = new ActivityProduct();
                $title = "产品展示报表";
                $primary_key = 'activity_product_id';
                $name = 'activity_product_name';

                break;

            case 'CLICK':

                break;
            default:

                break;
        }
        $ids = [];
        foreach ($list as $item){
            $ids[] = $item->object_id;
        }

        $namelist = $model->whereIn($primary_key,$ids)->get();
        $nameMap = [];
        foreach ($namelist as $item){
            $nameMap[$item->$primary_key] = $item->$name;
        }


        return view('statist/show_hour_list', ['list' => $list,'title'=>$title,'namemap'=>$nameMap]);
    }
    public function showDayStatisticsList(Request $request){

        $all = $request->all();
        $type = $all['type'];

        $list = DB::table('ad_show_statistics')->where('log_type',$type)
            ->groupBy('request_day','object_id')
            ->select([DB::raw('sum(count) as count'),DB::raw('sum(cheat_count) as cheat_count'),'request_day','object_id'])->paginate(5);


        switch ($type){
            case 'ADS_REQ':
                //广告位请求
                $model = new AdvertisingSpace();
                $title = "广告位报表";
                $primary_key = 'advertising_space_id';
                $name = 'advertising_space_name';

                break;
            case 'QUERY_AD':
                //广告展示
                $model = new Advertising();
                $title = "广告展示报表";
                $primary_key = 'advertising_id';
                $name = 'advertising_name';

                break;

            case 'ACTIVITY_JS_REQ':
                //活动请求
                $model = new Activity();

                break;

            case 'ACTIVITY_SHOW':
                //活动展示
                $model = new Activity();
                $title = "活动展示报表";
                $primary_key = 'activity_id';
                $name = 'activity_name';

                break;
            case 'PRODUCT_SHOW':
                //产品展示
                $model = new ActivityProduct();
                $title = "产品展示报表";
                $primary_key = 'activity_product_id';
                $name = 'activity_product_name';

                break;

            case 'CLICK':

                break;
            default:

                break;
        }
        $ids = [];
        foreach ($list as $item){
            $ids[] = $item->object_id;
        }

        $namelist = $model->whereIn($primary_key,$ids)->get();
        $nameMap = [];
        foreach ($namelist as $item){
            $nameMap[$item->$primary_key] = $item->$name;
        }


        return view('statist/show_day_list', ['list' => $list,'title'=>$title,'namemap'=>$nameMap]);
    }


    public function clickHourStatisticsList(Request $request){
        $all = $request->all();
        $type = $all['type'];
        $list = DB::table('ad_click_statistics')->where('log_type',$type)->orderBy('created_at')->paginate(5);

        $title = '短链接点击';

        $ShortUrlModel = new ShortUrl();

        $shorturls = [];

        foreach ($list as $item){

            $shorturls[] = $item->shorturl;
        }

        $namelist = $ShortUrlModel->whereIn('shorturl',$shorturls)->get();
        $nameMap = [];
        foreach ($namelist as $item){
            $nameMap[$item->shorturl] = $item->original_url;
        }
        return view('statist/click_hour_list', ['list' => $list,'title'=>$title,'namemap'=>$nameMap]);

    }
    public function clickDayStatisticsList(Request $request){
        $all = $request->all();
        $type = $all['type'];
        $list = DB::table('ad_click_statistics')->where('log_type',$type)
            ->groupBy('request_day','shorturl')
            ->select(DB::raw('sum(count) as count'),DB::raw('sum(cheat_count) as cheat_count'),'request_day','shorturl')->paginate(5);

        $title = '短链接点击';

        $ShortUrlModel = new ShortUrl();

        $shorturls = [];

        foreach ($list as $item){

            $shorturls[] = $item->shorturl;
        }

        $namelist = $ShortUrlModel->whereIn('shorturl',$shorturls)->get();
        $nameMap = [];
        foreach ($namelist as $item){
            $nameMap[$item->shorturl] = $item->original_url;
        }

        return view('statist/click_day_list', ['list' => $list,'title'=>$title,'namemap'=>$nameMap]);

    }

    
}
