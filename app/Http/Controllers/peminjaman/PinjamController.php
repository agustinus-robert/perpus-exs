<?php

namespace App\Http\Controllers\peminjaman;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PinjamController extends Controller
{
    //
    public function index(){
        return View('peminjaman.index');
    }
}
