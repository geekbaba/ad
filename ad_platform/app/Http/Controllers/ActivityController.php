<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Activity;

class ActivityController extends WithAuthController
{
    
    public function activityList(){
        
        $activitys = DB::table('ad_activity')->orderBy('created_at')->paginate(5);
        
        return view('activity/list', ['activitys' => $activitys]);
        
    }
    
    
    public function create(){
        
        
        
        return view('activity/create');
        
    }
    
    public function edit($activity_id){
        
        $ActivityModel = new Activity();
        $activity = $ActivityModel->where('activity_id',$activity_id)->first();
        
        return view('activity/edit', ['activity' => $activity]);
    }
    
    public function store(Request $request){
        
        $all = $request->all();
        $output = [
            'status'=>1
            ,'msg'=>'success'
        ];
        
        $ActivityModel = new Activity();
        
        $data = [];
        
        $data['activity_name'] = $all['activity_name'];
        
        $data['status'] = isset($all['status']) ? $all['status'] : '1';
        
        $data['creator'] = $this->user->user_id;
        
        
        if(isset($all['activity_id']) && $all['activity_id']!=''){
            
            $data['modified_by'] = $this->user->user_id;
            
            $result = $ActivityModel->where('activity_id',$all['activity_id'])->update($data);
        
        }else{
            
            $data['creator'] = $this->user->user_id;
            $result = $ActivityModel->create($data);
            
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
