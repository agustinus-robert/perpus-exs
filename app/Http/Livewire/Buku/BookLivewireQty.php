<?php

namespace App\Http\Livewire\Buku;
use App\bukuModel as bM;
use App\supBuku as sB;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class BookLivewireQty extends Component
{
    public $qty;
    public $id_buku;
    public $pilih_sup;
    public $nama_buku;
    
    public function addqty(){
      
    }
    
    public function getbook($id){
         $gets = bm::select(DB::raw('lib_jumlah_buku.jumlah_buku as jml_buku,'
                 . 'lib_buku.judul as judul, '
                 . 'lib_buku.id as id_b'))
              ->leftJoin('lib_jumlah_buku', 'lib_buku.id', '=', 'lib_jumlah_buku.id_buku')
              ->where('lib_buku.id', $id)
              ->get()->toArray();
//                 ->toSql();
//         dd($gets);
         
         if($gets){
           foreach($gets as $k => $v){
              $this->id_buku = $v['id_b'];
              $this->nama_buku = $v['judul'];
              if(!empty($v['jml_buku'])){
                $this->qty = $v['jml_buku'];
              } else {
                $this->qty = 0;
              }
           }
         }else{
             $this->id_buku = 0;
             $this->nama_buku = "Data buku tidak ada";
             $this->qty = "Data buku tidak ada";
         }
    }
    
    public function render()
    {
        $data['semua_buku'] = bm::select('*')->get()->toArray();
        $data['supplier_buku'] = sB::select('*')->get()->toArray();
        return view('livewire.buku.book-livewire-qty', $data);
    }
}
