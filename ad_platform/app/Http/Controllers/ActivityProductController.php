<?php

namespace App\Http\Controllers;


use App\Enum\ShortUrlType;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\UploadedFile;
use App\Libraries\AttachInterface\AttachHelper;
use App\Libraries\AttachInterface\Attach;
use App\Model\ActivityProduct;
use App\Libraries\ShortUrlInterface\ShortUrlHelper;

class ActivityProductController extends WithAuthController
{
    
    public function productList(){
        
        $activity_products = DB::table('ad_activity_product')->orderBy('created_at')->paginate(5);
        
        return view('activity_product/list', ['activity_products' => $activity_products]);
        
    }
    
    
    public function create(){
        
        
        $product_configure = Config::get('product-0001');
        
        
        return view('activity_product/create', ['product_configures_json'=>json_encode($product_configure)]);
        
    }
    
    public function edit($activity_product_id){
        
        $ActivityProductModel = new ActivityProduct();
        
        $product = $ActivityProductModel->where('activity_product_id',$activity_product_id)->first();
        
        $urlkeys = Config::get('urlkeys');
        
        if($product->activity_product_attribute!=''){
            
            $attribute = json_decode($product->activity_product_attribute);
            foreach ($attribute as $k=>$v){
                if(in_array($k, $urlkeys)){
                    $url = ShortUrlHelper::get($v);
                    $attribute->$k = $url;
                }else{
                    $attribute->$k = $v;
                }
            }
            
            $product->activity_product_attribute = json_encode($attribute);
        }
        
        $product_configure = Config::get('product-0001');
        
        return view('activity_product/edit', ['product' => $product ,'product_configures_json'=>json_encode($product_configure)]);
    }
    
    public function store(Request $request){
        
        $all = $request->all();
        $output = [
            'status'=>1
            ,'msg'=>'success'
        ];
        
        $ActivityProductModel = new ActivityProduct();
        
        $data = [];
        
        $data['activity_product_name'] = $all['activity_product_name'];

        
        $data['status'] = isset($all['status']) ? $all['status'] : '1';
        
        
        $product_configure = Config::get('product-0001');
        
        $attribute_configures = $product_configure['attribute'];
        
        foreach ($all['attribute'] as $key=>$value){
            
            if($value instanceof UploadedFile){
                
                if($value->isValid()) {
                    
                        try {
                            
                            AttachHelper::verification($value, $attribute_configures[$key]);
                            
                        }catch (\Exception $e){
                               
                            $output = [
                                'status'=>0
                                ,'msg'=>$key.":".$e->getMessage()
                            ];
                            
                            return response()->json($output);
                        }
                    $attach = AttachHelper::upload($value);
                    $attribute[$key] = $attach->hash_key;
                }else{
                    $output = [
                        'status'=>0
                        ,'msg'=>'upload failed'
                    ];
                    return response()->json($output);
                }
            }else{
                
                $urlkeys = Config::get('urlkeys');
                //处理成短链接
                if(in_array($key, $urlkeys)){
                    
                    $short_url = ShortUrlHelper::make($value,ShortUrlType::AD_PRODUT);
                    $attribute[$key] = $short_url;
                    
                }else{
                 
                    $attribute[$key] = $value;
                   
                }
            }
        }
        
        $data['activity_product_attribute'] = json_encode($attribute);
        
        
        if(isset($all['activity_product_id']) && $all['activity_product_id']!=''){
            
            $data['modified_by'] = $this->user->user_id;
            
            $result = $ActivityProductModel->where('activity_product_id',$all['activity_product_id'])->update($data);
        
        }else{
            
            $data['creator'] = $this->user->user_id;
            $result = $ActivityProductModel->create($data);
            
        }
        
        if($result){
            $output = [
                'status'=>1
                ,'msg'=>'success'
            ];
        }else{
            $output = [
                'status'=>0
                ,'msg'=>'failed'
            ];
        }
        return response()->json($output);
        
        
    }
    
}
