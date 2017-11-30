<?php

namespace App\Http\Controllers;

use App\Libraries\AttachInterface\AttachHelper;

class AttachController extends Controller
{
    
    public function attach($hash_key){
        
        $attach = AttachHelper::get($hash_key);
        //dump($attach);
        //;
        $content = file_get_contents($attach->attach_relative_src);
        //需要修改
        header('Content-Type:'.$attach->attach_mime_type);
        echo $content;die;
        //response($content)->header('Content-Type', $attach->attach_mime_type);
        //file_put_contents($filename, $data);
    }
    
    
}
