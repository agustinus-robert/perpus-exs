<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class home extends Controller
{
    //
    public function index(){
        return View('front_asset.home');
    }
}
