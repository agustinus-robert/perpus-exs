@extends('layout')

@section('konten')
    @livewire('buku.book-livewire-edit', ['id' => Route::current()->parameter('id')])  
@endsection