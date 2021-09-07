<html>
    <head>
        <title>Aplikasi - @yield('title')</title>
        
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script> 
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
         <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
         
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
     
        @livewireStyles
    </head>
    <body>
         <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">v1 - on work</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto ">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{url('/')}}">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('buku-index')}}">Koleksi Buku</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('index_pengunjung')}}">Pengunjung</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('index_peminjaman')}}" tabindex="-1">Peminjaman</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('index_pengembalian')}}" tabindex="-1">Pengembalian</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('/denda-index')}}" tabindex="-1">Denda</a>
              </li>
            </ul>
            
          </div>
        </div>
      </nav>
        
        <div class='container'>
      

            <div class="container">
                @yield('konten')
            </div>
            
        </div>
        @livewireScripts
    </body>
</html>