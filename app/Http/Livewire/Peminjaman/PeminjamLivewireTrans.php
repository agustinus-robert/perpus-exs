<?php

namespace App\Http\Livewire\Peminjaman;
use Illuminate\Support\Facades\DB;
use App\bukuModel as bM;
use App\Peminjaman as Pjm;
use App\PeminjamanDetail as PjmDtl;
use Session;
use Livewire\Component;

class PeminjamLivewireTrans extends Component
{
    public $buku_pilih;
    public $isbn;
    public $cari;
    public $id_pgj;
    public $qty_tb;
    public $detail = [];
  //  public $jml_pjm;
    public $data_buku = [];
    
    public function mount($id){
        $this->id_pgj = $id;
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
            if($v['jml_buku'] == 0 || $v['jml_buku'] < 1){
               Session::flash('message-habis', "Buku berjudul: ".$v['judul']." stock telah habis");
            } else {
                 if(empty($this->data_buku[$id])){
                    $this->data_buku[$v['awal_id']][]= array('id_bk' => $v['awal_id'],
                        'judul' => $v['judul'],
                        'jml_pinjam' => 1,
                        'jml_stock' => $v['jml_buku']);                  
                } else {
                 
                    if($this->data_buku[$v['awal_id']] == $this->data_buku[$id]){                       
                        foreach($this->data_buku[$v['awal_id']] as $k => $vss){  
                            $this->data_buku[$id][$k]['jml_pinjam']++;
                        }      
                    }
                }
            }
        }
    }
    
    public function get_id_buku_change($id, $ubah){
                                 
        foreach($this->data_buku[$id] as $k => $vss){  
            $this->data_buku[$id][$k]['jml_pinjam'] = $ubah;
        }        
    }
    
    public function hapus_id_buku($id){
        unset($this->data_buku[$id]);
    }
    
    public function get_detail_buku($id){
        $this->detail = bM::select(DB::raw('SUM(lib_jumlah_buku.jumlah_buku) as jml_buku,'
                 . 'lib_buku.judul as judul, '
                 . 'lib_buku.pengarang as pengarang, '
                 . 'lib_buku.penerbit as penerbit, '
                 . 'lib_buku.isbn as isbn, '
                 . 'lib_supplier.nama_supplier as nama_supplier, '
                 . 'lib_jumlah_buku.id as id, '
                 . 'lib_buku.foto as foto, '
                 . 'lib_buku.id as awal_id'
                ))
              ->leftJoin('lib_jumlah_buku', 'lib_buku.id', '=', 'lib_jumlah_buku.id_buku')
              ->leftJoin('lib_supplier', 'lib_jumlah_buku.supplier_id', '=', 'lib_supplier.id')
              ->where('lib_buku.id', $id)
              ->groupBy('lib_buku.id') 
              ->get()->toArray();
        
        
    }
    
    public function masukTransPinjam(){
        if(count($this->data_buku) < 1){
            Session::flash('message-cart-kosong', "Buku belum ada di cart transaksi");
        } else {
            //$link = $_SERVER["REQUEST_URI"];
           
//          $trans_pinjam = [];
//          $trans_detail = [];
//          foreach($this->data_buku as $k1 => $v1){
//              foreach($v1 as $k2 => $v2){
//                  
//                  $trans_pinjam = [
//                      'id_pengunjung' => $this->id_pgj,
//                      'id_buku' => $v2['id_bk']
//                  ];
//                  
//                  $trans_detail = [
//                      'jumlah_pinjam' => $v2['jml_pinjam'],
//                      'jumlah_aktual' => $v2['jml_stock']
//                  ];
//              }
//          }
            
                    
            DB::beginTransaction();
            try {

                 $trans_pinjam = [
                    'id_pengunjung' => $this->id_pgj,
                 ];
                 
                 $id_trans = Pjm::create($trans_pinjam)->id;

                foreach($this->data_buku as $k1 => $v1){
                    foreach($v1 as $k2 => $v2){
                        
                        $trans_detail = [
                            'id_buku' => $v2['id_bk'],
                            'jumlah_pinjam' => $v2['jml_pinjam'],
                            'jumlah_aktual' => $v2['jml_stock']
                        ];
                           
                        $trans_detail['id_trans_pinjam'] = $id_trans;
                        PjmDtl::create($trans_detail);  
                    }
                }
         

               DB::commit();

               Session::flash('message', "Transaksi Pinjam dimassukan, silahkan proses waktu peminjaman");
               //return redirect('buku-add');
            } catch (\Exception $e) {
                DB::rollback();
                dd($e);
            }
        }
    }
    
    public function cari_click(){
        
    }
    
    public function render()
    {
        $data['trans'] = bM::select("*")->get()->toArray();
        return view('livewire.peminjaman.peminjam-livewire-trans', $data);
    }
}
