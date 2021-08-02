<div> 
       @if (session()->has('message'))
                <div class="col-md-4">
                    <div class="alert alert-success">
                        {{ session('message') }} Silahkan, check pada <a href="{{url('/getDaftarBuku')}}">Daftar Buku</a>
                    </div>
                </div>
            @endif
            
            @if (session()->has('message-habis'))
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        {{ session('message') }} Silahkan, tambah stock di <a href="{{url('/qty_buku')}}">Setting Qty Buku</a>
                    </div>
                </div>
            @endif
            
            @if (session()->has('message-cart-kosong'))
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        {{ session('message-cart-kosong') }}
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
                      
                        <td><a class="btn btn-danger" href="javascript:void(0)" wire:click="get_id_buku({{ $v['id']}})">Add</a> || <a class="btn btn-primary" href="javascript:void(0)" wire:click="get_detail_buku({{ $v['id'] }})">Detail</a></td>
                        
                    </tr>
                    <?php } ?>
                    </tbody>
                 </table>
            </div>
        </div>
            
        <div class='col-md-4 text-center'>
            <?php if(!empty($detail[0]['isbn'])){ ?>
            <h5 class='text-center mt-1 mb-2 p-1'>{{$detail[0]['judul']}}</h5>
            <hr>
    
            <?php } else { ?>
            <h5 class='text-center'></h5>
            <?php } ?>
            <div class='form-group mb-2'>
                <label>
                    <b>No ISBN</b>
                    <?php if(!empty($detail[0]['isbn'])){ ?>
                    <input type="text" style="border:1px window;" class="form-control" value="{{$detail[0]['isbn']}}" disabled>
                    <?php } else { ?>
                    <input type="text" style="border:1px window;" class="form-control" value="" disabled>
                    <?php } ?>
                </label>
            </div>
            
             <div class='form-group mb-2'>
                 <label>
                     <b>Pengarang</b>
                     <?php if(!empty($detail[0]['pengarang'])){ ?>
                     <input type="text" style="border:1px window;" class="form-control" value="{{$detail[0]['pengarang']}}" disabled>
                      <?php } else { ?>
                     <input type="text" style="border:1px window" class="form-control" value="" disabled>
                      <?php } ?>
                </label>
            </div>
            
            <div class='form-group mb-2'>
                 <label>
                     <b>Foto</b>
                     <div class="shadow p-3 mb-5" style="width:250px;height:250px;border:1px solid gray;">
                         <?php if(!empty($detail[0]['judul'])){ ?>
                        <img style="width:160px;height:200px;" src='{{url('public/image/'.$detail[0]['foto'])}}'></img>
                         <?php } else { ?>
                         <img class='img-thumbnail' src=''></img>
                        <?php } ?>
                     </div>
                </label>
            </div>
            
            <div class='form-group mb-2'>
                 <label>
                     <b>Penerbit</b>
                     <?php if(!empty($detail[0]['penerbit'])){ ?>
                     <input type="text" style="border:1px window;" class="form-control" value="{{$detail[0]['penerbit']}}" disabled>
                     <?php } else { ?>
                     <input type="text" style="border:1px window" class="form-control" value="" disabled>
                     <?php } ?>
                </label>
            </div>
            
           
        </div>
            
        <div class="col-md-4">
        <form wire:submit.prevent="masukTransPinjam" class="col-md-12">
                <div class="row col-xs-12 form-group mb-2">
                    <table class="table">
                        <thead class="text-center"> 
                            <tr>
                                <th>Judul Buku</th>
                                <th>Jumlah Pinjam</th>
                                <th>Jumlah Stock Aktual</th>
                                <th><i class="fa fa-trash" aria-hidden="true" style="font-size:30px;"></i></th>
                            </tr>
                        </thead>
                        
                        <tbody class="text-center">
                            <?php 
                            foreach($data_buku as $k => $v){ foreach($v as $k2 => $v2){ ?>
                                <tr>
                                    <td><input class="form-control" type="text" style="background-color:white;width:60px; border:none;" disabled value="{{$v2['judul']}}"></td>
                                    <td style="width:20px;"><input class="form-control" type="text" wire:change="get_id_buku_change({{$v2['id_bk']}}, $event.target.value)" value="{{$v2['jml_pinjam']}}"></td>
                                    <td><input class="form-control" type="text" style="background-color:white;width:60px; border:none;" disabled value="{{$v2['jml_stock']}}"></td>
                                    <td><a class="btn btn-secondary" href="javascript:void(0)" wire:click="hapus_id_buku({{ $v2['id_bk'] }})">x</a></td>
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

