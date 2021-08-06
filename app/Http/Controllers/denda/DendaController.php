<?php

namespace App\Http\Controllers\denda;

use App\Http\Controllers\Controller;
use DataTables;
use App\Peminjaman as Pjm;
use App\pengunjungPerpus as Pp;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class DendaController extends Controller
{
    //
    public function index(){
        return View("denda.index");
    }
    
    public function daftar_trans_denda(Request $request){
         if ($request->ajax()) {

            $data = Pjm::select(DB::raw('lib_pengunjung.nama as nama,'
                    .'lib_peminjam.tanggal_pinjam as tgl_pjm, '
                    .'lib_peminjam.tanggal_kembali as tgl_kbl, '
                    .'lib_peminjam.id as id, '
                    .'lib_peminjam.status as status, '
                    .'lib_peminjam.status_denda as stt_denda'
                ))
              ->leftJoin('lib_pengunjung', 'lib_peminjam.id_pengunjung', '=', 'lib_pengunjung.id')
               ->where([[DB::raw('DATE(lib_peminjam.tgl_pengembalian)'),'>',DB::raw('DATE(lib_peminjam.tanggal_kembali)')], ['lib_peminjam.pengembalian','=','2']])
              ->groupBy('lib_peminjam.id')
              ->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        if($row->stt_denda == 0 || $row->stt_denda == null){
                            $btn = '<a href="'.url('proses_denda/'.$row->id).'" class="edit btn btn-warning btn-sm">Proses Denda</a>';
                        } else {
                            $btn = "Proses denda berhasil di transaksi ini";
                        }
                        return $btn;
                    })->rawColumns(['action'])->make(true);

        }
        
        return View('denda.daftar_denda');
    }
    
    public function denda_proses($id){
        $data['id'] = $id;
        return View('denda.proses_denda', $data);
    }
}
