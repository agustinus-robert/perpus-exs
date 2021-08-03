@extends('header')

@section('konten')
    @livewire('pengembalian.pengembalian-livewire', ['id' => Route::current()->parameter('id')])
@endsection