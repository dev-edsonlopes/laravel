@extends('layout.layout')
@section('title', 'HOME')
@section('conteudo')
<h1>Home Page</h1>
{{-- ESTRUTURA DE REPETIÇÃO --}}

@php
    $frutas = array('Goiba', 'Banana', 'Maçã');
@endphp

@foreach ($frutas as $fruta)
    {{ $fruta }} <br />
@endforeach
@endsection