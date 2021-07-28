<?php

namespace App\Http\Controllers\buku;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\bukuModel as Buku;
use DataTables;
use Session;

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
                        $btn .= "|";
                        $btn .= '<a href="'.url('delete_buku/'.$row->id).'" class="edit btn btn-danger btn-sm" onclick="return confirm('."'Are you sure you want to delete this item?'".');">Hapus</a>';
                        return $btn;
                    })->rawColumns(['action'])->make(true);

        }

        return view('buku.buku');

    }
    
    public function tambah_qty_buku(){
        return view('buku.qty_buku');
    }
    
    public function hapus($id){ 
        $get_sts = Buku::where('id', $id)->delete();
        
        if($get_sts){
           Session::flash('message-hapus', "Buku berhasil dihapus");
           return redirect('/getDaftarBuku');
        }
    }
    
    public function edit($id){
        $data['id'] = $id;
        return View('buku.edit', $data);
    }
    
    public function tambah(){
        return view('buku.add');
    }
}
