<div> 
       @if (session()->has('message'))
                <div class="col-md-4">
                    <div class="alert alert-success">
                        {{ session('message') }} Silahkan, check pada <a href="{{url('/getDaftarBuku')}}">Daftar Buku</a>
                    </div>
                </div>
            @endif
            
    <div class="row">
        
         
        <div class="col-md-4">
            <div class='col-md-12'>
             <input type='text' class='form-control' wire:model='cari_buku' placeholder='cari buku' />
             
             <table class='table'>
                 <thead>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Kelola</th>
                </thead>
                
                <tbody>
                    <?php
                    $i = 1;
                    foreach($trans as $k => $v){ 
                    ?>
                    <tr>
                        <td><?=$i++;?></td>
                        <td><?=$v['judul']?></td>
                        <td><a class="btn btn-danger" href="javascript:void(0)" wire:click="get_id_buku({{ $v['id'] }})">Add</a> || <a class="btn btn-primary" href="javascript:void(0)">Detail</a></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                 </table>
            </div>
        </div>
            
        <div class='col-md-4' style='border-left:1px solid green;'>
            <h5 class='text-center'>Judul Buku</h5>
            <div class='form-group'>
                <label>
                    No ISBN
                </label>
            </div>
            
            <div class='form-group'>
                 <label>
                    Deskripsi
                </label>
            </div>
            
             <div class='form-group'>
                 <label>
                    Pengarang
                </label>
            </div>
            
            <div class='form-group'>
                 <label>
                    Foto
                </label>
            </div>
            
            <div class='form-group'>
                 <label>
                    Penerbit
                </label>
            </div>
        </div>
            
        <div class="col-md-4" style='border-left:1px solid green;'>
        <form wire:submit.prevent="masukTransPinjam" class="col-md-12">
                
                <div class="row col-xs-12 form-group mb-2">
                    <table class="table">
                        <thead class="text-center"> 
                            <tr>
                                <th>Judul Buku</th>
                                <th>Jumlah Pinjam</th>
                                <th>Jumlah Stock Aktual</th>
                                <th></th>
                            </tr>
                        </thead>
                        
                        <tbody class="text-center">
                            <?php foreach($data_buku as $k => $v){ foreach($v as $k2 => $v2){ ?>
                                <tr>
                                    <td><input type="text" style="width:60px; border:none;" disabled value="{{$v2['judul']}}"></td>
                                    <td style="width:20px;"><input class="form-control" type="text" value="{{$v2['jml_pinjam']}}"></td>
                                    <td>{{$v2['jml_stock']}}</td>
                                    <td><a href="javascript:void(0)" wire:click="hapus_id_buku({{ $v2['id_bk'] }})">x</a></td>
                                </tr>
                            <?php }} ?>
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
</div>

