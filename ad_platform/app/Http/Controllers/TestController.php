<?php

namespace App\Http\Controllers;



class TestController extends Controller
{
    
    public function index(){
        
        return response()->view('adtest');
    }
    
    
}
