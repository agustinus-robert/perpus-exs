<?php

namespace App\Http\Livewire\Denda;
use Illuminate\Support\Facades\DB;
use App\bukuModel as bM;
use App\Peminjaman as Pjm;
use App\PeminjamanDetail as PjmDtl;
use App\DendaModel as dM;
use App\DendaDetail as dT;
use Session;
use Livewire\Component;

class DendaLivewire extends Component
{
    public $ids;
    public $jml_denda;
    public $tipe;
    public $buku = [];
    public $denda = [];
    public $arr_baru = [];
    
    public function mount($id){
        $this->ids = $id;
        
        $data_livewire = Pjm::select(DB::raw('lib_pengunjung.nama as nama,'
                    .'lib_peminjam.tanggal_pinjam as tgl_pjm, '
                    .'lib_peminjam.tanggal_kembali as tgl_kbl, '
                    .'lib_peminjam.id as id, '
                    .'lib_peminjaman_detail.id_buku as det_buku,'
                    .'lib_peminjaman_detail.jumlah_pinjam as jml_buku, '
                    .'lib_buku.judul as nama_buku, '
                    .'lib_buku.id as idb '
                ))  
              ->leftJoin('lib_pengunjung', 'lib_peminjam.id_pengunjung', '=', 'lib_pengunjung.id')
              ->leftJoin('lib_peminjaman_detail','lib_peminjam.id','=','lib_peminjaman_detail.id_trans_pinjam')
              ->leftJoin('lib_buku','lib_peminjaman_detail.id_buku','=','lib_buku.id')
             // ->groupBy('lib_peminjam.id')
              ->where('lib_peminjam.id',$this->ids)
              ->get()->toArray();
        
        foreach($data_livewire as $k => $v){
            $this->denda[$k]['buku'] = $v['idb'];
        }
        
    }
    
    public function masukProsesDenda(){     
        
      
       
        foreach($this->denda as $k => $v){
            if($v == null){
                unset($k);
            } else {
                $this->arr_baru[$k] = $v; 
            }
        }
        
        
        DB::beginTransaction();
        try {

           $trans_denda = [
              'id_pinjam' => $this->ids,
              'jml_denda' => $this->jml_denda
           ];
           
           $id_trans = dM::create($trans_denda)->id;
           
           
           foreach($this->arr_baru as $k => $v){
            $trans_detail = [
                'id_buku' => $v['buku'],
                'tipe_denda' => $v['tipe']
            ];
            
            $trans_detail['id_denda'] = $id_trans;
            dT::create($trans_detail); 
           }
           
            $arr_edit = [
                'status_denda' => 1
            ];
            
            Pjm::where('id', $this->ids)
             ->update($arr_edit);
//        
           DB::commit();

           Session::flash('message', "Transaksi dikenakan didenda");
           return redirect('transaksi-denda');
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
        }
    }
    
    public function render()
    {
        $data['daftar_proses'] = Pjm::select(DB::raw('lib_pengunjung.nama as nama,'
                    .'lib_peminjam.tanggal_pinjam as tgl_pjm, '
                    .'lib_peminjam.tanggal_kembali as tgl_kbl, '
                    .'lib_peminjam.id as id, '
                    .'lib_peminjaman_detail.id_buku as det_buku,'
                    .'lib_peminjaman_detail.jumlah_pinjam as jml_buku, '
                    .'lib_buku.judul as nama_buku, '
                    .'lib_buku.id as idb '
                ))  
              ->leftJoin('lib_pengunjung', 'lib_peminjam.id_pengunjung', '=', 'lib_pengunjung.id')
              ->leftJoin('lib_peminjaman_detail','lib_peminjam.id','=','lib_peminjaman_detail.id_trans_pinjam')
              ->leftJoin('lib_buku','lib_peminjaman_detail.id_buku','=','lib_buku.id')
             // ->groupBy('lib_peminjam.id')
              ->where('lib_peminjam.id',$this->ids)
              ->get()->toArray();
        
        return view('livewire.denda.denda-livewire', $data);
    }
}
