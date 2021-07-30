<?php

namespace App\Http\Controllers\peminjaman;

use DataTables;
use App\Peminjaman as Pjm;
use App\pengunjungPerpus as Pp;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PinjamController extends Controller
{
    //
    public function index(){
        return View('peminjaman.index');
    }
    
    public function transaksi_pemijaman(Request $request){
        if ($request->ajax()) {

            $data = Pp::all();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="'.url('get_edit_buku/'.$row->id).'" class="edit btn btn-warning btn-sm">Kelola Peminjaman</a>';
                        return $btn;
                    })->rawColumns(['action'])->make(true);

        }
        
        return View('peminjaman.daftar_pinjam');
    }
}
