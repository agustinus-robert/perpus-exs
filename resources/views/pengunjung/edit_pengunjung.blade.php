@extends('layout')

@section('konten')
    @livewire('pengunjung.pengunjung-edit', ['id' => Route::current()->parameter('id')])
@endsection