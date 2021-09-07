<?php

namespace App\Http\Livewire\Buku;
use App\bukuModel as bM;
use App\supBuku as sB;
use App\jmlBuku as jB;
use Session;
use Illuminate\Support\Facades\DB;

use Livewire\Component;

class BookLivewireQtyEdit extends Component
{
    public $qty;
    public $id_buku;
    public $pilih_sup;
    public $nama_buku;
    public $pilih_buku;
    public $selected;
    
    protected $listeners = [
        'getbook',
    ];
    
    public function mount($id){          
        $this->data = jB::select(DB::raw("lib_buku.*, lib_jumlah_buku.*"))->where('lib_jumlah_buku.id', $id)
                ->leftJoin('lib_buku', 'lib_buku.id', '=', 'lib_jumlah_buku.id_buku')
                  ->get()->toArray();
        
        foreach($this->data as $k => $v){
            $this->ids = $id;
            $this->selected = $v['id_buku'];
            $this->nama_buku = $v['judul'];
            $this->qty = $v['jumlah_buku'];
            $this->jumlah_buku = $v['jumlah_buku'];
        }
    }
    
    public function masukEditBukuQty(){
         $arr_masuk = [
          'id_buku' => $this->id_buku,
          'jumlah_buku' => $this->qty,
          'supplier_id' => $this->pilih_sup,
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
        ];
         
        if(!is_numeric($this->qty)){
            $this->addError('qty', 'Harus berisi angka');
        } else {
            DB::beginTransaction();
            try {

               jB::insert($arr_masuk);

               DB::commit();

               Session::flash('message', "Quantity buku telah ditambah");
               return redirect('qty_buku');
            } catch (\Exception $e) {
                DB::rollback();
                dd($e);
            }
        }
    }
    
    public function getbook($id){
        
         $gets = bm::select(DB::raw('lib_jumlah_buku.jumlah_buku as jml_buku,'
                 . 'lib_buku.judul as judul, '
                 . 'lib_buku.id as id_b'))
              ->leftJoin('lib_jumlah_buku', 'lib_buku.id', '=', 'lib_jumlah_buku.id_buku')
              ->where('lib_buku.id', $id)
              ->get()->toArray();
         
         if($gets){
           foreach($gets as $k => $v){
              $this->id_buku = $v['id_b'];
              $this->nama_buku = $v['judul'];
              $this->selected = $v['id_b'];
             
           }
         }else{
             $this->id_buku = 0;
             $this->nama_buku = "Data buku tidak ada";
         }
    }
    
    public function render()
    {
        $data['semua_buku'] = bm::select('*')->get()->toArray();
        $data['supplier_buku'] = sB::select('*')->get()->toArray();
        $this->emit('select2');

        return view('livewire.buku.book-livewire-qty-edit', $data);
    }
}
