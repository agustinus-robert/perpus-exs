<?php

namespace App\Http\Controllers\peminjaman;

use DataTables;
use App\Peminjaman as Pjm;
use App\pengunjungPerpus as Pp;
use Illuminate\Support\Facades\DB;
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
                        $btn = '<a href="'.url('get_pinjam_pengunjung/'.$row->id).'" class="edit btn btn-warning btn-sm">Kelola Peminjaman</a>';
                        return $btn;
                    })->rawColumns(['action'])->make(true);

        }
        
        return View('peminjaman.daftar_pinjam');
    }
    
    public function get_daftar_pending(Request $request){
        if ($request->ajax()) {

            $data = Pjm::select(DB::raw('lib_pengunjung.nama as nama,'
                    .'lib_peminjam.tanggal_pinjam as tgl_pjm, '
                    .'lib_peminjam.tanggal_kembali as tgl_kbl, '
                    .'lib_peminjam.id as id'
                ))
              ->leftJoin('lib_pengunjung', 'lib_peminjam.id_pengunjung', '=', 'lib_pengunjung.id')
              ->groupBy('lib_peminjam.id')
              ->get();
             

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="'.url('get_trans_pjm/'.$row->id).'" class="edit btn btn-primary btn-sm">Proses Peminjaman</a>';
                        return $btn;
                    })->rawColumns(['action'])->make(true);

        }
        
        return View('peminjaman.daftar_trans_pinjam');
    }
    
    public function get_pinjam_pengunjung($id){
       $data['pengunjung'] = Pp::where('id', $id)->get()->toArray();
       
       return View('peminjaman.peminjaman_trans', $data);
    }
}
