<?php

namespace App\Http\Controllers\buku;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\bukuModel as Buku;
use DataTables;

class BukuController extends Controller
{
    public function index(){
        return view('buku.index');
    }
    
    public function getDaftarBuku(Request $request){
                if ($request->ajax()) {

            $data = Buku::all();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="'.url('get_edit_buku/'.$row->id).'" class="edit btn btn-warning btn-sm">Edit</a>';
                        $btn .= " | ";
                        $btn .= '<a href="'.url('get_hapus_buku/'.$row->id).'" class="edit btn btn-danger btn-sm">Hapus</a>';
                        return $btn;
                    })->rawColumns(['action'])->make(true);

        }


        return view('buku.buku');

    }

    public function get_id_buku($id){
        $data['id'] = $id;
        return view('buku.edit', $data);
    }
    
    
    public function tambah(){
        return view('buku.add');
    }
}
