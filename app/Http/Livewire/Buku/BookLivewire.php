<?php

namespace App\Http\Livewire\Buku;

use Livewire\Component;

class BookLivewire extends Component
{
    public $no_isbn;
    public $judul_buku;
    public $pengarang;
    public $penerbit;
    
    protected $rules = [
        'no_isbn' => 'required|max:20',
        'judul_buku' => 'required|max:20',
        'pengarang' => 'required|max:100',
        'penerbit' => 'required',
    ];
    
    public function masukBuku(){
        $validatedData = $this->validate();
        
        $arr_masuk = [
          'isbn' => $this->no_isbn,
          'judul_buku' => $this->judul_buku,
          'pengarang' => $this->pengarang,
          'penerbit' => $this->penerbit
        ];
        
        dd($arr_masuk);
        
        DB::beginTransaction();
        try {
          
           epa::where('id', $this->ids)
                    ->update($this->arr);
          //  Storage::delete($employee->file);
         
          //  \Storage::disk('public')->delete($this->photo->getClientOriginalName());
           if(!empty($this->photo)){
            \Storage::disk('public')->put($this->photo->getClientOriginalName(), file_get_contents($this->photo));
           }
           
           DB::commit();
           
           Session::flash('message', "Artikel telah diedit");
           return redirect('dashboard');
        } catch (\Exception $e) {
            \Storage::disk('public')->delete($this->photo->getClientOriginalName());
            DB::rollback();
            dd($e);
        }
    }
    
    public function render()
    {
        return view('livewire.buku.book-livewire');
    }
}
