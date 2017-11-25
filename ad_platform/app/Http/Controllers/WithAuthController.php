<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;

class WithAuthController extends Controller
{
    
    protected $user;
    
    public function __construct(){
        
        $this->middleware('auth');
        
        $this->middleware(function ($request, $next) {
            $this->user = $request->user();
            return $next($request);
        });
    }
}
