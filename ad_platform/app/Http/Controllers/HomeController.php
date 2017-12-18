<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;

class HomeController extends WithAuthController
{
    
    /**
     $userModel = new User();
     $data = [
     'username'=>'jianghao'
     ,'realname'=>'江浩'
     ,'status'=>1
     ,'creator'=>1
     ,'password'=>Hash::make('123456')
     ];
     $user = $userModel->create($data);
     
     $userModel = new User();
        $userModel->where('user_id',1)->update(['status'=>2]);
     */
    public function index()
    {
        //$password = Hash::make('086hg412mx');
        //$userModel = new User();
        //$userModel->where('user_id',1)->update(['password'=>$password]);
        return view('dashboard/index');
    }
}
