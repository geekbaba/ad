<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Traits\RequestPretreatment;
class ClickController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests ,RequestPretreatment;
    
    public function index(Request $request){
        $this->make($request);
    }
    
}
