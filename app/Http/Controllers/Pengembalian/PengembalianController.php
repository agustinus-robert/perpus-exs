<?php

namespace App\Http\Controllers\Pengembalian;

use DataTables;
use App\Peminjaman as Pjm;
use App\pengunjungPerpus as Pp;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    //
    public function index(){
        return View('pengembalian.index');
    }
    
    public function trans_pengembalian(Request $request){
        if ($request->ajax()) {

            $data = Pjm::select(DB::raw('lib_pengunjung.nama as nama,'
                    .'lib_peminjam.tanggal_pinjam as tgl_pjm, '
                    .'lib_peminjam.tanggal_kembali as tgl_kbl, '
                    .'lib_peminjam.id as id, '
                    .'lib_peminjam.status as status, '
                    .'DATEDIFF(lib_peminjam.tanggal_kembali, NOW()) as selisih'
                ))
              ->leftJoin('lib_pengunjung', 'lib_peminjam.id_pengunjung', '=', 'lib_pengunjung.id')
              ->where('lib_peminjam.status', 1)
              ->groupBy('lib_peminjam.id')
              ->get();
             

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('selisih', function($row) {
                        if($row->selisih < 0){
                            return ($row->selisih * -1)." (Keterlambatan)";
                        } else if($row->selisih == 0) {
                            return $row->selisih." (Waktu Terakhir pengembalian)";
                        } else {
                            return $row->selisih;
                        }
                    })
                    ->addColumn('action', function($row){
                        if($row->status == 1){
                            $btn = '<a href="'.url('proses_kembali/'.$row->id).'" class="edit btn btn-danger btn-sm">Proses Pengembalian</a>';
                        } 
                        
                        return $btn;
                    })->rawColumns(['action'])->make(true);

        }
        
        return View('pengembalian.trans_pengembalian');
    }
    
     public function proses_pengembalian_peminjaman($id){
        $data['id'] = $id;
        return View('pengembalian.proses_pengembalian_peminjaman', $data);
    }
}
