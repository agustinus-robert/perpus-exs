<?php

namespace App\Http\Controllers\buku;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index(){
        return view('buku.index');
    }
    
    public function tambah(){
        return view('buku.add');
    }
}
