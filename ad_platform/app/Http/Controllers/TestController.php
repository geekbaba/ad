<?php

namespace App\Http\Controllers;



use Illuminate\Support\Facades\Config;

class TestController extends Controller
{
    
    public function index(){

        $server_host = Config::get('services.server_host.adserver');

        return response()->view('adtest',['server_host'=>$server_host]);
    }
    
    
}
