<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function index()
    {
        return view('admin/login');
    }
    
    public function postLogin(Request $request){
        
        $name = $request->input('username');
        $password = $request->input('password');
        if( empty($remember)) {  //remember表示是否记住密码
            $remember = 0;
        } else {
            $remember = $request->input('remember');
        }
        //如果要使用记住密码的话，需要在数据表里有remember_token字段
        if (Auth::attempt(['username' => $name, 'password' => $password], $remember)) {
            return redirect()->intended('/');
        }
        
        return redirect('login')->withInput($request->except('password'))->with('msg', '用户名或密码错误');
        
    }
}
