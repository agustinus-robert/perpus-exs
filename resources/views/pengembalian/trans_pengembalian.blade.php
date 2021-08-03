@extends('header')

@section('konten')
 @if (session()->has('message'))
                <div class="col-md-12">
                    <div class="alert alert-success">
                        {{ session('message') }} 
                    </div>
                </div>
            @endif
            
<div class='row p-4'>
        <h2 class='text-center'>Kelola Pengembalian Buku</h2>
        <hr>
        <div class='row justify-content-center'>
            <nav class="col-md-6 navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mx-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="{{url('/getDaftarBuku')}}">Laporan Pengembalian</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('/transaksi_peminjaman')}}">Transaksi Pengembalian</a>
                    </li>
                  </ul>
                </div>
              </nav>
        </div>
    </div>
    
        @if (session()->has('message-hapus'))
                <div class="col-md-12">
                    <div class="alert alert-success">
                        {{ session('message') }} Buku berhasil dihapus
                    </div>
                </div>
            @endif
            
                <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th width="50">No</th>
                        <th>Nama</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Action</th>
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

        ajax: "{{ route('dp') }}",

        columns: [

            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama', name: 'nama'},
            {data: 'tgl_pjm', name: 'tgl_pjm'},
            {data: 'tgl_kbl', name: 'tgl_kbl'},
            {data: 'action', name: 'action'},
        ]
    });
    
  });

</script>

@endsection