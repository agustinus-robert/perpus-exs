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
                      <a class="nav-link" href="{{url('/qty_buku')}}">Setting Buku</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Laporan Buku</a>
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
    
        <select class="form-control" wire:change="getbook($event.target.value)">
            <option value="none">None</option>
            <?php foreach($semua_buku as $k => $v){  ?>
            <option value="{{$v['id']}}">{{$v['judul']}}</option>
            <?php } ?>
        </select>
            
        <form wire:submit.prevent="masukBuku">
                <input type="text" class="form-control" wire:model="id_buku" />
                <div class="col-xs-12 mb-2">  
                    <div class="row">
                        <div class="col-xs-12 ">
                              <label>Qty Buku</label>
                                <input class="form-control" type="text" wire:model="qty" placeholder="Massukan jumlah buku"/>
                        @error('judul_buku')
                            <span class="bg-danger text-white">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>      
                    </div>
                </div>
                     
                <div class='col-md-12 form-group'>
                    <div class="col text-center">
                    
                     <button type="submit" class="btn btn-primary">Tambah Qty</button>
                    </div>
                </div>
        </form>
    </div>
</div>