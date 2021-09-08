<div>
    <div class='row p-4'>
        <h2 class='text-center'>Kelola Denda</h2>
        <hr>
        <div class='row justify-content-center'>
            <nav class="col-md-6 navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mx-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="#">Laporan Deda</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('/transaksi-denda')}}">Transaksi Denda</a>
                    </li>
                  </ul>
                </div>
              </nav>
        </div>
    </div>
    
    
        @if (session()->has('message'))
                <div class="col-md-12">
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                </div>
            @endif
            
    <div class="row">    
        <form wire:submit.prevent="masukProsesDenda">
           
            <div class="col-md-12">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Buku</th>
                            <th>Jumlah Pinjam</th>
                            <th>Status Pengembalian</th>
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
                        <input type="hidden" wire:model="denda.{{$k}}.buku" />
                        <td><select wire:model="denda.{{$k}}.tipe">
                                <option value="0">Pilih Denda</option>
                                <option value="1">Keterlambatan</option>
                                <option value="2">Buku Hilang/Rusak</option>
                            </select>
                        </td>
                    </tr>
                <?php } ?>

                </table>
                
                <div class="col text-center mb-3">
                    <label>Jumlah Denda: <input type="text" class="form-control" wire:model="jml_denda" placeholder="Massukan nominal Denda" /></label>
                </div>
            </div>
            
            <div class="col text-center">
                <button type="submit" class="btn btn-success mt-3" />Proses Data</button>
            </div>
        </form>
    </div>
</div>
