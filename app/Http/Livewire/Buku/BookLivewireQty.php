<?php

namespace App\Http\Livewire\Buku;

use Livewire\Component;

class BookLivewireQty extends Component
{
    public $qty;
    public $id_buku;
    
    public function addqty(){
        
    }
    public function render()
    {
        return view('livewire.buku.book-livewire-qty');
    }
}
