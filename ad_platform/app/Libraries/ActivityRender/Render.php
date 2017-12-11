<?php 
namespace App\Libraries\ActivityRender;



class Render{
    
    
    protected static $renderEngine = null;
    
    static function init(){
        
    }
    
    static function  render($activity,$skin){
        
        ;
        
        switch ($activity->skin_configure_code){
            case '0001':
                self::$renderEngine = new WheelOfFortuneRender();
                break;
            case '0002':
                self::$renderEngine = new WheelOfFortuneRender();
                break;
        }
        
        return self::$renderEngine->render($activity,$skin);
    }
    
    
}