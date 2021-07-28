<?php

namespace App\Http\Livewire\Buku;
use App\bukuModel as bM;
use Livewire\Component;

class BookLivewireQty extends Component
{
    public $qty;
    public $id_buku;
    
    public function addqty(){
      
    }
    
    public function getbook($id){
         $gets = bm::select('*')
              ->where('id', $id)
              ->get()->toArray();
         
         if($gets){
           foreach($gets as $k => $v){
              $this->id_buku = $v['id'];
           }
         }else{
             dd("No data");
         }
    }
    
    public function render()
    {
        $data['semua_buku'] = bm::select('*')->get()->toArray();
        return view('livewire.buku.book-livewire-qty', $data);
    }
}
