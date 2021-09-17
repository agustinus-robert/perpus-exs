<div>
   <div class='row p-4'>
        <h2 class='text-center'>Kelola Buku</h2>
        <hr>
          <div class='row justify-content-center'>
            <nav class="col-md-6 navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mx-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="{{url('/getDaftarBuku')}}">Daftar Buku</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('/buku-add')}}">Tambah Buku</a>
                    </li>
                     <li class="nav-item">
                     <div class="dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                          Setting Buku
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                          <li><a class="dropdown-item" href="{{url('/daftar_qty')}}">Daftar Qty</a></li>
                          <li><a class="dropdown-item" href="{{url('/qty_buku')}}">Tambah Qty</a></li>
                        </ul>
                      </div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('/getLaporBuku')}}">Laporan Buku</a>
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
                        <label>Nomor Isbn</label>
                        <input class="form-control" type="text" wire:model="no_isbn"/>
                        @error('no_isbn')
                            <span class="bg-danger text-white">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
             
                <div class="col-xs-6 mb-2">  
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                              <label>Judul Buku</label>
                                <input class="form-control" type="text" wire:model="judul_buku" placeholder="Judul Buku"/>
                        @error('judul_buku')
                            <span class="bg-danger text-white">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label>Pengarang</label>
                                <input class="form-control" type="text" wire:model="pengarang" placeholder="Pengarang"/>
                                @error('pengarang')
                                    <span class="bg-danger text-white">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                </div>
            
                <div class="col-xs-6 form-group mb-3">
                        <label>Penerbit</label>
                        <input class="form-control" wire:model="penerbit" type="text" />
                        @error('penerbit')
                            <span class="bg-danger text-white">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            
             <div class="col-xs-6 form-group mb-3">
                        <label>Foto</label>
                        <input wire:model="photo" class="form-control" type="file" />
                        @error('photo')
                            <span class="bg-danger text-white">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            
                <div class='col-md-12 form-group'>
                    <div class="col text-center">
                    
                     <button type="submit" class="btn btn-primary">masuk</button>
                    </div>
                </div>
        </form>
    </div>
</div>