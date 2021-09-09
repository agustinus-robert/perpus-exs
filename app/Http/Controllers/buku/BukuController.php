<?php

namespace App\Http\Controllers\buku;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\bukuModel as Buku;
use App\jmlBuku as jB;
use Illuminate\Support\Facades\DB;
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
    
    public function getLaporanBuku(Request $request){
                if ($request->ajax()) {

            $data = Buku::select(DB::raw('lib_jumlah_buku.jumlah_buku as jml_buku,'
                 . 'lib_buku.judul as judul, '
                 . 'lib_buku.pengarang as pengarang, '
                 . 'lib_buku.penerbit as penerbit, '
                 . 'lib_buku.isbn as isbn, '
                 . 'lib_jumlah_buku.id as id'
                ))
              ->leftJoin('lib_jumlah_buku', 'lib_buku.id', '=', 'lib_jumlah_buku.id_buku')
              ->where('lib_jumlah_buku.jumlah_buku', ">", 0)
              ->get();
              
            return Datatables::of($data)
                    ->addIndexColumn()
                   ->make(true);
        }

        return view('buku.laporan_buku');

    }
    
    public function tambah_qty_buku(){
        return view('buku.qty_buku');
    }
    
    public function daftar_qty(Request $request){
        if ($request->ajax()) {

            $data = Buku::select(DB::raw('lib_jumlah_buku.jumlah_buku as jml_buku,'
                 . 'lib_buku.judul as judul, '
                 . 'lib_buku.pengarang as pengarang, '
                 . 'lib_buku.penerbit as penerbit, '
                 . 'lib_buku.isbn as isbn, '
                 . 'lib_jumlah_buku.id as id'
                ))
              ->leftJoin('lib_jumlah_buku', 'lib_buku.id', '=', 'lib_jumlah_buku.id_buku')
              ->where('lib_jumlah_buku.jumlah_buku', ">", 0)
              ->get();
              
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="'.url('get_edit_buku_qty/'.$row->id).'" class="edit btn btn-warning btn-sm">Edit</a>';
                        $btn .= "|";
                        $btn .= '<a href="'.url('get_buku_qty_hapus/'.$row->id).'" class="edit btn btn-danger btn-sm" onclick="return confirm('."'Are you sure you want to delete this item?'".');">Hapus</a>';
                        return $btn;
                    })->rawColumns(['action'])->make(true);

        }
        
        return view('buku.daftar_qty_buku');
    }
    
    public function get_edit_qty($id){
        $data['id'] = $id;
        return View('buku.edit_qty', $data);
    }
    
    public function hapus_qty($id){
         $get_jml = jB::where('id', $id)->delete();
        
        if($get_jml){
           Session::flash('message-hapus-data', "Jumlah buku berhasil dihapus");
           return redirect('/daftar_qty');
        }
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
