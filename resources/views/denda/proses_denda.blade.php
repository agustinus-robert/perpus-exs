@extends('layout')

@section('konten')
    @livewire('denda.denda-livewire', ['id' => Route::current()->parameter('id')])
@endsection