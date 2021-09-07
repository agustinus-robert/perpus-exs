@extends('layout')

@section('konten')
    @livewire('buku.book-livewire-qty-edit', ['id' => Route::current()->parameter('id')])
@endsection