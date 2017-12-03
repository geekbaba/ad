<?php 
namespace App\Libraries\AdvertisingSpace;


use Illuminate\Support\Facades\Config;

class AdvertisingSpace{
    
    protected static $code = [
        'default'=>'<script async src="//{render_js}"></script>
            <ins class="adsbygoojo" style="display:inline-block;width:{width}px;height:{height}px" goojoad-ad-client="{goojoad-ad-client}" goojoad-slot="{goojoad-slot}"></ins><script>
             (adsbygoojo = window.adsbygoojo || []).push({});
             </script>'
    ];
    protected static $AdvertisingSpaceEntity = null;
    
    static function init(){
        self::$AdvertisingSpaceEntity = new MysqlAdvertisingSpace();
    }
    
    static function get($slot){
        
    }
    
    static function makeCode($advertising_space_id){
        
        $attr = self::$AdvertisingSpaceEntity::getAttr($advertising_space_id);
        /**
        */
        $render_js = Config::get('renderjs.loader');
        //101 //PC
        //201 //移动端

        //
        
        $goojoad_slot = Slot::maker($attr['advertising_type_id'], $attr['width'], $attr['height'], $attr['media_id'], $attr['advertising_space_id']);
        $goojoad_ad_client = 'mb-c-02adf';
        
        $code_template = self::$code['default'];
        
        //goojoad-ad-client
        //goojoad-slot
        //8位
        $code_template = str_replace_first('{render_js}', $render_js.$goojoad_slot, $code_template);
        $code_template = str_replace_first('{width}', $attr['width'], $code_template);
        $code_template = str_replace_first('{height}', $attr['height'], $code_template);
        
        $code_template = str_replace_first('{goojoad-slot}', $goojoad_slot, $code_template);
        $code_template = str_replace_first('{goojoad-ad-client}', $attr['height'], $code_template);
        
        return $code_template;
    }
    
}