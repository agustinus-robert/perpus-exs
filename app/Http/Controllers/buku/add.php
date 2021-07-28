<?php

namespace App\Http\Controllers\buku;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class add extends Controller
{
    public function index(){
        return view('buku.add');
    }
}
