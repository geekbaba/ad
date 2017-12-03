<?php 
namespace App\Enum;

use Paillechat\Enum\Enum;

class ADWidthHeight extends Enum{
    
    /**
       
     * @var array
     */
    const WH_19_x_19 = '019019';//25x25
    const WH_1E_x_1E = '01E01E';//30x30
    const WH_32_x_32 = '032032';//50x50
    const WH_64_x_64 = '064064';
    
    const WH = [
        self::WH_19_x_19=>'25x25'
        ,self::WH_1E_x_1E=>'30x30'
        ,self::WH_32_x_32=>'50x50'
        ,self::WH_64_x_64=>'100x100'
    ];
    
}