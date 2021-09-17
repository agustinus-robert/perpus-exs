<?php

namespace App\Http\Livewire\Buku;
use Illuminate\Support\Facades\DB;
use App\bukuModel as bM;
use Session;

use Livewire\WithFileUploads;
use Livewire\Component;

class BookLivewire extends Component
{
    use WithFileUploads;
    
    public $photo;
    public $no_isbn;
    public $judul_buku;
    public $pengarang;
    public $penerbit;
    
    protected $rules = [
        'no_isbn' => 'required|max:20',
        'judul_buku' => 'required|max:20',
        'pengarang' => 'required|max:100',
        'penerbit' => 'required',
        'photo' => 'image|max:1024',
    ];
    
    public function masukBuku(){
        $validatedData = $this->validate();
        
        $arr_masuk = [
          'isbn' => $this->no_isbn,
          'judul' => $this->judul_buku,
          'pengarang' => $this->pengarang,
          'penerbit' => $this->penerbit,
          'foto' => $this->photo->getClientOriginalName()
        ];

        $this->photo->storeAs('public/image', $this->photo->getClientOriginalName());
        
        DB::beginTransaction();
        try {
          
           bM::insert($arr_masuk);
        
           DB::commit();
           
           Session::flash('message', "Buku telah dimassukan");
           return redirect('buku-add');
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
        }
    }
    
    public function render()
    {
        return view('livewire.buku.book-livewire');
    }
}
