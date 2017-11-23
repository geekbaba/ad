<?php 
namespace App\Libraries\AdvertisingSpace;


class AdvertisingSpace{
    
    protected static $code = [
        'default'=>'<script async src="//{render_js}"></script>
            <ins class="adsbygoojo" style="display:inline-block;width:{width}px;height:{height}px" goojoad-ad-client="{goojoad-ad-client}" goojoad-slot="{goojoad-slot}"></ins><script>
             (adsbygoojo = window.adsbygoojo || []).push({});
             </script>'
    ];
    protected static $AdvertisingSpaceEntity = null;
    
    public static function __construct(){
        self::$AdvertisingSpaceEntity = new MysqlAdvertisingSpace();
    }
    
    static function get($slot){
        
    }
    
    static function makeCode($advertising_space_id){
        
        $attr = self::$AdvertisingSpaceEntity->getAttr($advertising_space_id);
        /**
        $attr['width'];
        $attr['height'];
        $attr['advertising_space_type_id'];
        $attr['render_js'];
        $attr['advertising_space_id'];
        $attr['media_id'];
        $attr['advertising_space_type_id'];
        */
        $render_js = '';
        //101 //PC
        //201 //移动端

        //
        
        //FFF FFF FFF   -     FFFF - FFFFFFFF
        //广告位类型 + 宽 + 高  - 媒体ID - 广告位ID
        $goojoad_slot = sprintf('%s%s%s-%s-%s'
            ,padzero_dechex($attr['advertising_space_type_id'], 3)
            ,padzero_dechex($attr['width'], 3)
            ,padzero_dechex($attr['height'], 3)
            ,padzero_dechex($attr['media_id'], 4)
            ,padzero_dechex($attr['advertising_space_id'], 8)
            );
        
        $goojoad_ad_client = 'mb-c-02adf';
        
        $code_template = self::$code['default'];
        
        //goojoad-ad-client
        //goojoad-slot
        //8位
        $code_template = str_replace_first('{render_js}', $render_js, $code_template);
        $code_template = str_replace_first('{width}', $attr['width'], $code_template);
        $code_template = str_replace_first('{height}', $attr['height'], $code_template);
        
        $code_template = str_replace_first('{goojoad-slot}', $goojoad_slot, $code_template);
        $code_template = str_replace_first('{goojoad-ad-client}', $attr['height'], $code_template);
        
        return $code_template;
    }
    
}