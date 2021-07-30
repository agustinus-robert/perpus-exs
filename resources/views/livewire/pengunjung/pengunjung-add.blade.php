<div>
    <div class='row p-4'>
        <h2 class='text-center'>Kelola Pengunjung</h2>
        <hr>
        <div class='row justify-content-center'>
            <nav class="col-md-6 navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mx-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="{{url('/getDaftarPengunjung')}}">Daftar Pengunjung</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('/pengunjung-add')}}">Tambah Pengunjung</a>
                    </li>
                  </ul>
                </div>
              </nav>
        </div>
    </div>
<div class="row">
        
            @if (session()->has('message'))
                <div class="col-md-12">
                    <div class="alert alert-success">
                        {{ session('message') }} Silahkan, check pada <a href="{{url('/getDaftarPengunjung')}}">Daftar Pengunjung</a>
                    </div>
                </div>
            @endif
    
    
        <form wire:submit.prevent="addPengunjung">
                <div class="col-xs-6 form-group mb-2">
                        <label>Nama Pengunjung</label>
                        <input class="form-control" type="text" wire:model="nama_pengunjung" placeholder="nama pengunjung" />
                        @error('no_isbn')
                            <span class="bg-danger text-white">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            
             <div class="col-xs-6 form-group mb-3">
                        <label>NIK/No Ktp/No kartu Pelajar</label>
                        <input class="form-control" wire:model="nomor_kartu" type="text" placeholder="Nomor Kartu (Diisi oleh admin perpus)"/>
                        @error('penerbit')
                            <span class="bg-danger text-white">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
             
                <div class="col-xs-6 mb-2">  
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                              <label>Tanggal Lahir (Sesuai KTP)</label>
                                <input class="form-control" type="date" wire:model="tgl_lahir" />
                        @error('judul_buku')
                            <span class="bg-danger text-white">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label>Alamat (Domisili Sekarang)</label>
                                <input class="form-control" type="text" wire:model="alamat" placeholder="Alamat"/>
                                @error('pengarang')
                                    <span class="bg-danger text-white">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                </div>
            
                <div class='col-md-12 form-group'>
                    <div class="col text-center">
                    
                     <button type="submit" class="btn btn-primary">masuk</button>
                    </div>
                </div>
        </form>
    </div>
</div>