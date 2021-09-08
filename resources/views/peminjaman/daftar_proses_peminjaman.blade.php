@extends('layout')

@section('konten')
    @livewire('peminjaman.pending-peminjaman', ['id' => Route::current()->parameter('id')])
@endsection