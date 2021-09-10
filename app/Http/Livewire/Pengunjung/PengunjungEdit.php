<?php

namespace App\Http\Livewire\Pengunjung;
use App\pengunjungPerpus as Pp;
use Illuminate\Support\Facades\DB;
use Session;

use Livewire\Component;

class PengunjungEdit extends Component
{
    public $nama_pengunjung;
    public $nomor_kartu;
    public $tgl_lahir;
    public $alamat;
    
    public $id_edit;
    
    public function mount($id){
        $this->id_edit = $id;
        
        $data = Pp::select("*")->get()->toArray();
        foreach($data as $k => $v){
            $this->nama_pengunjung = $v['nama'];
            $this->nomor_kartu = $v['no_kartu'];
            $this->tgl_lahir = date('Y-m-d', strtotime($v['tgl_lahir']));
            $this->alamat = $v['alamat'];
        }
    }
    
    public function editPengunjung(){
        $arr_edit = [
          'nama' =>  $this->nama_pengunjung,
          'no_kartu' => $this->nomor_kartu,
          'tgl_lahir' => $this->tgl_lahir,
          'alamat' => $this->alamat
        ];
        
        DB::beginTransaction();
        try {
          
           Pp::where('id', $this->id_edit)
                    ->update($arr_edit);
                   
           DB::commit();
           
           Session::flash('message', "Pengunjung telah diedit");
           return redirect('getDaftarPengunjung');
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
        }
    }
    
    public function render()
    {
        return view('livewire.pengunjung.pengunjung-edit');
    }
}
