<?php

namespace App\Http\Livewire\Peminjaman;
use Illuminate\Support\Facades\DB;
use App\bukuModel as bM;
use Session;
use Livewire\Component;

class PeminjamLivewireTrans extends Component
{
    public $buku_pilih;
    public $isbn;
    public $cari;
  //  public $jml_pjm;
    public $data_buku = [];
    
    public function masukTransPinjam(){
        dd($this->buku_pilih);
    }
    
    public function get_id_buku($id){
//        $get = bM::select("*")->where('id', $id)
//                  ->get()->toArray();
        
          $get = bM::select(DB::raw('SUM(lib_jumlah_buku.jumlah_buku) as jml_buku,'
                 . 'lib_buku.judul as judul, '
                 . 'lib_buku.pengarang as pengarang, '
                 . 'lib_buku.penerbit as penerbit, '
                 . 'lib_buku.isbn as isbn, '
                 . 'lib_supplier.nama_supplier as nama_supplier, '
                 . 'lib_jumlah_buku.id as id, '
                 . 'lib_buku.id as awal_id'
                ))
              ->leftJoin('lib_jumlah_buku', 'lib_buku.id', '=', 'lib_jumlah_buku.id_buku')
              ->leftJoin('lib_supplier', 'lib_jumlah_buku.supplier_id', '=', 'lib_supplier.id')
              ->where('lib_buku.id', $id)
              ->groupBy('lib_buku.id') 
              ->get()->toArray();
         
        foreach($get as $k => $v){      
            
            if(empty($this->data_buku[$id])){
                $this->data_buku[$v['awal_id']][]= array('id_bk' => $v['awal_id'],
                    'judul' => $v['judul'],
                    'jml_pinjam' => 1,
                    'jml_stock' => $v['jml_buku']);
            } else {
                if($this->data_buku[$v['awal_id']] == $this->data_buku[$id]){
                    $qty = 1;
                    foreach($this->data_buku[$v['awal_id']] as $k => $vss){
                        $this->data_buku[$id][$k]['jml_pinjam']++;
                    }
                }
            }
        }
    }
    
    public function hapus_id_buku($id){
        unset($this->data_buku[$id]);
    }
    
    public function cari_click(){
        
    }
    
    public function render()
    {
        $data['trans'] = bM::select("*")->get()->toArray();
        return view('livewire.peminjaman.peminjam-livewire-trans', $data);
    }
}
