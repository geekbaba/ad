<?php 
namespace App\Libraries\ProductSelector;


class Selector{
    
    
    protected static $selectEngine = null;
    
    static function init(){
        self::$selectEngine = new MysqlSelector();
    }
    
    static function  select($attr){
        
        return self::$selectEngine::select($attr);
    }
    
    
}