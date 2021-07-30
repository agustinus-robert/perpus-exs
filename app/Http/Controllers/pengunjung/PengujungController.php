<?php

namespace App\Http\Controllers\pengunjung;

use App\Http\Controllers\Controller;
use App\pengunjungPerpus as Pp;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class PengujungController extends Controller
{
    //
    public function index(){
       return View('pengunjung.index');
    }
    
    public function tambah(){
        return View('pengunjung.tambah_pengunjung');
    }
    
    public function getDaftarPengunjung(Request $request){
        if ($request->ajax()) {

            $data = Pp::all();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="'.url('get_edit_buku/'.$row->id).'" class="edit btn btn-warning btn-sm">Edit</a>';
                        $btn .= "|";
                        $btn .= '<a href="'.url('delete_buku/'.$row->id).'" class="edit btn btn-danger btn-sm" onclick="return confirm('."'Are you sure you want to delete this item?'".');">Hapus</a>';
                        return $btn;
                    })->rawColumns(['action'])->make(true);

        }
        
        return View('pengunjung.daftar_pengunjung');
    }
}
