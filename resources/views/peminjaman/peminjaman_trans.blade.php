@extends('header')

@section('konten')
    @livewire('peminjaman.peminjam-livewire-trans', ['id' => Route::current()->parameter('id')])
@endsection