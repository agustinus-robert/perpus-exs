@extends('layout')

@section('konten')
<div class='row p-4'>
        <h2 class='text-center'>Kelola Peminjaman Buku</h2>
        <hr>
        <div class='row justify-content-center'>
            <nav class="col-md-6 navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mx-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="#">Laporan Peminjaman</a>
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
                        <th>Nomor Kartu</th>
                        <th>Transaksi Pinjam</th>
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

        ajax: "{{ route('tb') }}",

        columns: [

            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama', name: 'nama'},
            {data: 'no_kartu', name: 'no_kartu'},
            {data: 'action', name: 'action'},
        ]
    });
    
  });

</script>

@endsection