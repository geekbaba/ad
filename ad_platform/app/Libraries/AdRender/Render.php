<?php 
namespace App\Libraries\AdRender;



class Render{
    
    
    protected static $renderEngine = null;
    
    static function init(){
        self::$renderEngine = new WapRender();
    }
    
    static function  render($ad){
        return self::$renderEngine::render($ad);
    }
    
    
}