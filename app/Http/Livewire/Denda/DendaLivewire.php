<?php

namespace App\Http\Livewire\Denda;

use Livewire\Component;

class DendaLivewire extends Component
{
    public $ids;
    
    public function mount($id){
        $this->ids = $id;
    }
    
    public function render()
    {
        return view('livewire.denda.denda-livewire');
    }
}
