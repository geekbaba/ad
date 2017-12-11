<?php 
namespace App\Libraries;

abstract class ActivityRenderInterface{
    
    
    abstract static function render($activity,$skin);
    
}