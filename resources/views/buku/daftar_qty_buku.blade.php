@extends('layout')

@section('konten')
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
    
        @if (session()->has('message-hapus'))
                <div class="col-md-12">
                    <div class="alert alert-success">
                        {{ session('message') }} Qty berhasil masuk
                    </div>
                </div>
            @endif
            
                <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th width="50">No</th>
                        <th>Judul</th>
                        <th>Qty</th>
                        <th width="200px">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>

<script type="text/javascript">

  $(function () {

    var table = $('.data-table').DataTable({

        processing: true,

        serverSide: true,

        ajax: "{{ route('qty_bk') }}",

        columns: [

            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'judul', name: 'judul'},

            {data: 'qty', name: 'qty'},

            {data: 'action', name: 'action', orderable: false, searchable: false},

        ]
    });
    
  });

</script>

@endsection