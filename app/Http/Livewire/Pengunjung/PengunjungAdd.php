<?php

namespace App\Http\Livewire\Pengunjung;
use App\pengunjungPerpus as Pp;
use Illuminate\Support\Facades\DB;
use Session;
use Livewire\Component;

class PengunjungAdd extends Component
{
    public $nama_pengunjung;
    public $nomor_kartu;
    public $tgl_lahir;
    public $alamat;
    
    public function render()
    {
        return view('livewire.pengunjung.pengunjung-add');
    }
    
    public function addPengunjung(){
        $arr_masuk = [
          'nama' =>  $this->nama_pengunjung,
          'no_kartu' => $this->nomor_kartu,
          'tgl_lahir' => $this->tgl_lahir,
          'alamat' => $this->alamat
        ];
        
        DB::beginTransaction();
        try {
          
           Pp::insert($arr_masuk);
        
           DB::commit();
           
           Session::flash('message', "Pengunjung telah didaftarkan");
           return redirect('tambah_pengunjung');
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
        }
    }
}
