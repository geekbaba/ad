<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Activity;
use App\Model\ActivitySkin;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\UploadedFile;
use App\Libraries\AttachInterface\AttachHelper;
use App\Libraries\AttachInterface\Attach;

class ActivitySkinController extends WithAuthController
{
    
    public function skinList(){
        
        $skins = DB::table('ad_activity_skin')->orderBy('created_at')->paginate(5);
        
        $activity_ids = [];
        
        foreach ($skins as $skin){
            $activity_ids[] = $skin->activity_id;
        }
        
        $ActivityModel = new Activity();
        
        $activitys = $ActivityModel->whereIn('activity_id',$activity_ids)->get();
        
        $activityIdMap = [];
        
        foreach ($activitys as $activity){
            $activityIdMap[$activity->activity_id] = $activity;
        }
        
        return view('activity_skin/list', ['skins' => $skins,'activityIdMap'=>$activityIdMap]);
    }
    
    
    public function activitySkinList($activity_id){
        
        $skins = DB::table('ad_activity_skin')->where('activity_id',$activity_id)->orderBy('created_at')->paginate(5);
        
        $ActivityModel = new Activity();
        
        $activity = $ActivityModel->where('activity_id',$activity_id)->first();
        
        
        return view('activity_skin/activity_skin_list', ['skins' => $skins,'activity'=>$activity]);
    }
    
    public function create($activity_id){
        
        $ActivityModel = new Activity();
        
        $activity = $ActivityModel->where('activity_id',$activity_id)->where('status',1)->first();
        
        $skin_configure_code = $activity->skin_configure_code;
        
        $skin_configures = Config::get('skin-'.$skin_configure_code);
        
        
        return view('activity_skin/create', ['activity' => $activity,'skin_configures_json'=>json_encode($skin_configures)]);
        
    }
    
    public function edit($activity_skin_id){
        
        $ActivitySkinModel = new ActivitySkin();
        
        $skin = $ActivitySkinModel->where('activity_skin_id',$activity_skin_id)->first();
        
        $ActivityModel = new Activity();
        
        $activity = $ActivityModel->where('activity_id',$skin->activity_id)->where('status',1)->first();
        
        $skin_configure_code = $activity->skin_configure_code;
        
        $skin_configures = Config::get('skin-'.$skin_configure_code);
        
        return view('activity_skin/edit', ['skin' => $skin ,'activity' => $activity ,'skin_configures_json'=>json_encode($skin_configures)]);
    }
    
    public function store(Request $request){
        
        $all = $request->all();
        $output = [
            'status'=>1
            ,'msg'=>'success'
        ];
        
        $ActivitySkinModel = new ActivitySkin();
        
        $data = [];
        
        $data['activity_skin_name'] = $all['activity_skin_name'];

        
        $data['activity_id'] = $all['activity_id'];
        
        $activity_id = $all['activity_id'];
        
        $data['status'] = isset($all['status']) ? $all['status'] : '1';
        
        $ActivityModel = new Activity();
        
        $activity = $ActivityModel->where('activity_id',$activity_id)->where('status',1)->first();
        
        $skin_configure_code = $activity->skin_configure_code;
        
        $skin_configures = Config::get('skin-'.$skin_configure_code);
        
        $attribute_configures = $skin_configures['attribute'];
        
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
                $attribute[$key] = $value;
            }
        }
        
        $data['activity_skin_attribute'] = json_encode($attribute);
        
        
        if(isset($all['activity_skin_id']) && $all['activity_skin_id']!=''){
            
            $data['modified_by'] = $this->user->user_id;
            
            $result = $ActivitySkinModel->where('activity_skin_id',$all['activity_skin_id'])->update($data);
        
        }else{
            
            $data['creator'] = $this->user->user_id;
            $result = $ActivitySkinModel->create($data);
            
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
