@extends('header')


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
                      <a class="nav-link" href="#">Laporan Buku</a>
                    </li>
                  </ul>
                </div>
              </nav>
        </div>
    </div>
     
        <div class="jumbotron mt-5">
          <h1 class="display-4">Modul Pengelolaan Buku</h1>
          <p class="lead">Pengelolaan buku dapat dilakukan melalui 3 link di atas</p>
          <hr class="my-4">
          <p>Revisi program dapat dikirim melalui email, dan segera laporkan testing error pada aplikasi ini</p>
          <a class="btn btn-primary btn-lg" href="#" role="button">Check Data</a>
        </div>
 
    @endsection