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
                        {{ session('message') }} Silahkan, check pada <a href="{{url('/getDaftarBuku')}}">Laporan Buku</a>
                    </div>
                </div>
            @endif
            
     <div class='col-md-4 form-group mx-auto mb-4'>
        <div class="col text-center">
            <select class="form-select" wire:model="selected" id="select-buku">
                <option value="none">None</option>
                <?php foreach($semua_buku as $k => $v){  
                    if($selected == $v['id']){
                    ?>
                    <option value="{{$v['id']}}" selected>{{$v['judul']}}</option>
                    <?php } else { ?>
                 <option value="{{$v['id']}}">{{$v['judul']}}</option>
                <?php }} ?>
            </select>
        </div>
     </div>
            
            <div class='col-md-12 form-group mx-auto mb-4'>
                <div class="col text-center">
                    <label><b>Judul Buku</b></label>
                    <input type="text" disabled class="form-control text-center" style="border: none;" wire:model="nama_buku" />
                </div>
            </div>
            
        <form wire:submit.prevent="masukBukuQty">
                <input type="hidden" class="form-control" wire:model="id_buku" />
                <div class="col-xs-12 mb-2">  
                    <div class="row">
                        <div class="col-xs-12 mb-2 text-center">
                              <label>Qty Buku</label>
                                <input class="form-control text-center" type="text" wire:model="qty" placeholder="Massukan jumlah buku"/>
                        @error('qty')
                            <span class="bg-danger text-white form-control">
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
    
    <script>
    $(document).ready(function() {
            window.initSelectCompanyDrop=()=>{
                $('#select-buku').select2({
                    placeholder: 'Pilih buku'});
            }
            initSelectCompanyDrop();
            $('#select-buku').on('change', function (e) {
                livewire.emit('getbook', e.target.value)
            });
            window.livewire.on('select2',()=>{
                initSelectCompanyDrop();
            });
    });
    </script>
</div>