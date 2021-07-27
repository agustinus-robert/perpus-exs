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
                      <a class="nav-link" href="#">Daftar Buku</a>
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

    <form>
        <div class="row">
                <div class="col-xs-6 form-group mb-2">
                        <label>Nomor Isbn</label>
                        <input class="form-control" type="text"/>
                </div>
             
                <div class="col-xs-6 mb-2">
                      
                        <div class="row">
                                <div class="col-xs-12 col-sm-6">
                                      <label>Judul Buku</label>
                                        <input class="form-control" type="text" placeholder="Judul Buku"/>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <label>Pengarang</label>
                                        <input class="form-control" type="text" placeholder="Pengarang"/>
                                </div>
                        </div>
                </div>
                <div class="col-xs-6 form-group mb-3">
                        <label>Penerbit</label>
                        <input class="form-control" type="text" />
                </div>
            
                <div class='col-md-12 form-group'>
                    <div class="col text-center">
                     <input type='button' class='btn btn-primary' value='Tambah Data' />
                    </div>
                </div>
        </div>
    </form>


@endsection