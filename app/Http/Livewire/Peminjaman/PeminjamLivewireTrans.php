<?php

namespace App\Http\Livewire\Peminjaman;

use Livewire\Component;

class PeminjamLivewireTrans extends Component
{
    public $buku_pilih;
    
    public function masukTransPinjam(){
        dd($this->buku_pilih);
    }
    
    public function get_id_buku($id){
        dd($id);
    }
    
    public function render()
    {
        return view('livewire.peminjaman.peminjam-livewire-trans');
    }
}
