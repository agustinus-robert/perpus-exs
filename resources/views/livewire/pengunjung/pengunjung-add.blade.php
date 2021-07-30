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
                        {{ session('message') }} Silahkan, check pada <a href="{{url('/getDaftarBuku')}}">Daftar Buku</a>
                    </div>
                </div>
            @endif
    
    
        <form wire:submit.prevent="masukBuku">
                <div class="col-xs-6 form-group mb-2">
                        <label>Nama Pengunjung</label>
                        <input class="form-control" type="text" wire:model="no_isbn"/>
                        @error('no_isbn')
                            <span class="bg-danger text-white">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            
             <div class="col-xs-6 form-group mb-3">
                        <label>Nomor Kartu</label>
                        <input class="form-control" wire:model="penerbit" type="text" />
                        @error('penerbit')
                            <span class="bg-danger text-white">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
             
                <div class="col-xs-6 mb-2">  
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                              <label>Tanggal Lahir</label>
                                <input class="form-control" type="text" wire:model="judul_buku" placeholder="Judul Buku"/>
                        @error('judul_buku')
                            <span class="bg-danger text-white">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label>Alamat</label>
                                <input class="form-control" type="text" wire:model="pengarang" placeholder="Pengarang"/>
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