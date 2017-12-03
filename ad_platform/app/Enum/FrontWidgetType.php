<?php 
namespace App\Enum;

use Paillechat\Enum\Enum;

class FrontWidgetType extends Enum{
    
    const TEXT = 0x1;
    
    const TEXT_AREA = 0x6;
    //select
    const SELECT = 0x2;
    //radio button
    const RADIO_BUTTON = 0x3;
    // file
    const FILE = 0x4;
    
    //image file
    const IMAGE = 0x5;
    
    //
    const DATE = 0x7;
    
    //
    const DATETIME = 0x8;
    //time
    const TIME = 0x9;
    
}