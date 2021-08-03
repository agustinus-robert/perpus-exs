@extends('header')

@section('konten')
    @livewire('pengembalian.proses_pengembalian_peminjaman', ['id' => Route::current()->parameter('id')])
@endsection