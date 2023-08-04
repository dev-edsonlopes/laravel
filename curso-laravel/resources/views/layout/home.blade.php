@extends('layout.layout')
@section('title', 'HOME')
@section('conteudo')

@include('includes.mensagem', [
    'titulo' => 'Home Page', 
    'paragrafo' => 'Hello! Welcome to my page'
    ])

@component('components.sidebar')
    @slot('paragrafo')
        Texto qualquer vindo do slot
    @endslot
@endcomponent
@endsection