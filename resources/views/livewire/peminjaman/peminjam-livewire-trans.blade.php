<div>
     <div class='row p-4'>
         <div class="col-md-12">
          <h2 class='text-center'>Kelola Peminjaman Buku</h2>
         </div>
        <hr>
        <div class='col-md-6 mx-auto'>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
    
    
        <form wire:submit.prevent="masukTransPinjam" class="col-md-12">
                
                <div class="row col-xs-12 form-group mb-2">
                    <table class="table">
                        <thead class="text-center"> 
                            <tr>
                                <th>No Isbn</th>
                                <th>Judul Buku</th>
                                <th>Jumlah Pinjam</th>
                                <th>Jumlah Stock Aktual</th>
                            </tr>
                        </thead>
                        
                        <tbody class="text-center">
                            <td></td>
                            
                            <td>
                                <select style="width:200px;" wire:model="buku_pilih" wire:change="get_id_buku($event.target.value)" class="selectpicker" data-live-search="true">
                                   <option value="AL">Alabama</option>
                                   <option value="WY">Wyoming</option>
                                </select>
                            </td>
                            
                            <td></td>
                            <td></td>
                        </tbody>
                    </table>
                </div>
             
            
            
                <div class='col-md-12 form-group'>
                    <div class="col text-center">
                    
                     <button type="submit" class="btn btn-success">Tambah Peminjaman</button>
                    </div>
                </div>
        </form>
    </div>
    
    <script type="text/javascript">
    $(document).ready(function() {
        $('.selectpicker').selectpicker();
    });
</script>
</div>

