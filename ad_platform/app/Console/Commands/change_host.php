<?php

namespace App\Console\Commands;

use App\Model\ActivityProduct;
use App\Model\Advertising;
use App\Model\AdvertisingSpace;
use App\Model\ShortUrl;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;

class change_host extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'change_host';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'change the system host config';

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
        /**
        $search_host = '192.168.10.125';
        $replace_host = '192.168.21.90';
         */

        $search_host = Config::get("services.server_host.adserver");
        //$search_host = '192.168.21.90';
        //$search_host = '192.168.10.125';
        $replace_host = '192.168.1.109';

        //


        $ActivityProductModel = new ActivityProduct();

        $activityproducts = $ActivityProductModel->get();


        foreach ($activityproducts as $activityproduct){

            //$activityproduct->activity_product_attribute;
            $activityproduct->activity_product_attribute = str_replace($search_host,$replace_host,$activityproduct->activity_product_attribute);
            $activityproduct->save();
        }

        $AdvertisingModel = new Advertising();

        $advertisings = $AdvertisingModel->get();

        foreach ($advertisings as $advertising){

            $advertising->advertising_attribute = str_replace($search_host,$replace_host,$advertising->advertising_attribute);
            $advertising->save();
        }

        $AdvertisingSpaceModel = new AdvertisingSpace();

        $adspaces = $AdvertisingSpaceModel->get();

        foreach ($adspaces as $adspace){

            $adspace->advertising_space_code = str_replace($search_host,$replace_host,$adspace->advertising_space_code);
            $adspace->save();
        }

        $ShortUrlModel = new ShortUrl();

        $shorturls = $ShortUrlModel->get();

        foreach ($shorturls as $shorturl){

            $shorturl->original_url = str_replace($search_host,$replace_host,$shorturl->original_url);
            $shorturl->save();
        }


        dd("[更新完毕]");
    }
}
