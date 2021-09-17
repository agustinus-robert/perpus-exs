<?php

namespace App\Http\Livewire\Pengembalian;
use App\Peminjaman as Pjm;
use App\pengunjungPerpus as Pp;
use App\jmlBuku as jbk;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Session;

class PengembalianLivewire extends Component
{
    public $ids;
    public $id_buku;
    public $jml_buku;
    public $kembali;
   
    public function mount($id){
        $this->ids = $id;
        
        $vals = Pjm::select(DB::raw('lib_pengunjung.nama as nama,'
                    .'lib_peminjam.tanggal_pinjam as tgl_pjm, '
                    .'lib_peminjam.tanggal_kembali as tgl_kbl, '
                    .'lib_peminjam.id as id, '
                    .'lib_peminjaman_detail.id_buku as det_buku,'
                    .'lib_peminjaman_detail.jumlah_pinjam as jml_buku, '
                    .'lib_buku.judul as nama_buku '
                ))  
              ->leftJoin('lib_pengunjung', 'lib_peminjam.id_pengunjung', '=', 'lib_pengunjung.id')
              ->leftJoin('lib_peminjaman_detail','lib_peminjam.id','=','lib_peminjaman_detail.id_trans_pinjam')
              ->leftJoin('lib_buku','lib_peminjaman_detail.id_buku','=','lib_buku.id')
             // ->groupBy('lib_peminjam.id')
              ->where('lib_peminjam.id',$this->ids)
              ->get()->toArray();
        
        
        foreach($vals as $k => $v){
            $this->kembali []= [
              'id_buku' => $v['det_buku'],
               'jml_buku' => $v['jml_buku']
            ];
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
                    .'lib_buku.judul as nama_buku '
                ))  
              ->leftJoin('lib_pengunjung', 'lib_peminjam.id_pengunjung', '=', 'lib_pengunjung.id')
              ->leftJoin('lib_peminjaman_detail','lib_peminjam.id','=','lib_peminjaman_detail.id_trans_pinjam')
              ->leftJoin('lib_buku','lib_peminjaman_detail.id_buku','=','lib_buku.id')
             // ->groupBy('lib_peminjam.id')
              ->where('lib_peminjam.id',$this->ids)
              ->get()->toArray();
        
        return view('livewire.pengembalian.pengembalian-livewire', $data);
    }
    
    public function masukProsesTransaksi(){
        

        $arr_edit = [
          'tgl_pengembalian' => date('Y-m-d'),
          'pengembalian' => 2
        ];

        DB::beginTransaction();
        try {
          
            foreach($this->kembali as $k => $v2){
                jbk::where('id_buku', $v2['id_buku'])->update([
                    'jumlah_buku' => DB::raw('jumlah_buku + '.$v2['jml_buku'])
                ]);
            }
            
           Pjm::where('id', $this->ids)
                    ->update($arr_edit);
        
           DB::commit();

           
           Session::flash('message', "Proses Pengembalian Berhasil");
           return redirect('daftar_trans_kembali');
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
        }
    }
}
