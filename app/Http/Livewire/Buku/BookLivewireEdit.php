<?php

namespace App\Http\Livewire\Buku;
use Illuminate\Support\Facades\DB;
use App\bukuModel as bM;
use Session;

use Livewire\WithFileUploads;
use Livewire\Component;

class BookLivewireEdit extends Component
{
    public $no_isbn;
    public $judul_buku;
    public $pengarang;
    public $penerbit;
    public $ids;
    public $photo; 
    use WithFileUploads;
    
    public $data;
    
    protected $rules = [
        'no_isbn' => 'required|max:20',
        'judul_buku' => 'required|max:20',
        'pengarang' => 'required|max:100',
        'penerbit' => 'required',
    ];
    
     public function mount($id){
       
        $this->data = bM::select("*")->where('id', $id)
                  ->get()->toArray();
        
        foreach($this->data as $k => $v){
            $this->ids = $v['id'];
            $this->no_isbn = $v['isbn'];
            $this->judul_buku = $v['judul'];
            $this->pengarang = $v['pengarang'];
            $this->penerbit = $v['penerbit'];
            $this->photo = $v['foto'];
        }
    }
    
    public function editSubmit(){
        $validatedData = $this->validate();
        
        if(!is_string($this->photo)){
            $this->photo = $this->photo->getClientOriginalName();
        } 
        
        $arr_edit = [
          'isbn' => $this->no_isbn,
          'judul' => $this->judul_buku,
          'pengarang' => $this->pengarang,
          'penerbit' => $this->penerbit,
          'foto' => $this->photo
        ];
     
        DB::beginTransaction();
        try {
           if(!is_string($this->photo)){
            //$this->photo->storePublicly('image');
            $this->photo->storeAs('public/image', $this->photo->getClientOriginalName());
           }
           
           bM::where('id', $this->ids)
                    ->update($arr_edit);
        
           DB::commit();
           
           Session::flash('message', "Buku berhasil diedit");
           return redirect('get_edit_buku/'.$this->ids);
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
        }
    }
    
    public function render()
    {
        return view('livewire.buku.book-livewire-edit');
    }
}
