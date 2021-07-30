<div>
     <div class='row p-4'>
        <h2 class='text-center'>Kelola Peminjaman Buku</h2>
        <hr>
        <div class='row justify-content-center'>
            <nav class="col-md-6 navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mx-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="{{url('/getDaftarBuku')}}">Laporan Peminjaman</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('/transaksi_peminjaman')}}">Transaksi Peminjaman</a>
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
                
                <div class="row col-xs-12 form-group mb-2">
                    <table class="table">
                        <thead class="text-center"> 
                            <tr>
                                <th>Id</th>
                                <th>No Isbn</th>
                                <th>Judul Buku</th>
                                <th>Jumlah Pinjam</th>
                                <th>Jumlah Stock Aktual</th>
                            </tr>
                        </thead>
                        
                    </table>
                </div>
             
            
            
                <div class='col-md-12 form-group'>
                    <div class="col text-center">
                    
                     <button type="submit" class="btn btn-success">Tambah Peminjaman</button>
                    </div>
                </div>
        </form>
    </div>
</div>