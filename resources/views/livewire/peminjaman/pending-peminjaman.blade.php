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
                      <a class="nav-link" href="{{url('/daftar_trans_pinjam')}}">Pending Peminjaman</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('/transaksi_peminjaman')}}">Transaksi Peminjaman</a>
                    </li>
                  </ul>
                </div>
              </nav>
        </div>
    </div>
    
     @if (session()->has('message-awal'))
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        {{ session('message-awal') }} 
                    </div>
                </div>
            @endif
            
             @if (session()->has('message-akh-awl'))
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        {{ session('message-akh-awl') }} 
                    </div>
                </div>
            @endif
            
             @if (session()->has('waktu-dob'))
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        {{ session('waktu-dob') }} 
                    </div>
                </div>
            @endif
    
    <div class="row">    
        <form wire:submit.prevent="masukProsesTransaksi">
            <div class="col-md-8 p-3 mx-auto">
                <table class="table">
                    <tr>
                        <td><label>Tanggal Awal: <input type="date" wire:model="waktu_awal" /></label></td>
                        <td><label>Tanggal Akhir: <input type="date" wire:model="waktu_akhir" /></label></td>
                    </tr>
                </table>
            </div>
            
            <div class="col-md-12">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Buku</th>
                            <th>Jumlah Pinjam</th>
                        </tr>
                    </thead>
                <?php
                    $i = 1;
                    foreach($daftar_proses as $k => $v){
                ?>
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$v['nama_buku']}}</td>
                        <td>{{$v['jml_buku']}}</td>
                    </tr>
                <?php } ?>

                </table>
            </div>
            
            <div class="col text-center">
                <button type="submit" class="btn btn-success" />Proses Data</button>
            </div>
        </form>
    </div>
</div>
