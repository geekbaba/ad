<?php 
namespace App\Libraries\ProductSelector;


use App\Libraries\SelectorInterface;
use App\Model\ActivityProduct;

class MysqlSelector extends SelectorInterface{
    
    
    static function select($attr){
        
        //
        
        $ActivityProductModel = new ActivityProduct();
        
        $activityProducts = $ActivityProductModel->get();
        
        $count = $activityProducts->count();
        $rand = (int) rand(0,$count-1);
        
        foreach ($activityProducts as $i=> $product){
            if($rand==$i){
                $product->attribute = json_decode($product->activity_product_attribute);
                return $product;
            }
        }
        
        return [];
    }
    
}