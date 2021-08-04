<?php

namespace App\Http\Controllers\denda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DendaController extends Controller
{
    //
    public function index(){
        return View("denda.index");
    }
}
