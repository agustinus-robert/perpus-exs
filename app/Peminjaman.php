<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    //
    protected $table = "lib_peminjam";
    public $timestamps = false;
    protected $guarded = [];
}
