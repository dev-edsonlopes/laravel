@extends('layout.layout')
@section('title', 'Detalhes')
@section('conteudo')

<div class="row container">

    <div class="col s12 m6">
        <img src="{{ $produto->imagem }}" class="responsive-img">
    </div>

    <div class="col s12 m6">
        <h4> {{ $produto->nome }}</h4>
        <h4> R$ {{ number_format($produto->preco, 2, ',', '.') }}</h4>
        <p> {{ $produto->descricao }}</p>
        <p> Postador por: {{ $produto->user->firstName }}</p>
        <p> Categoria: {{ $produto->nome }}</p>
        <button class="btn orange btn-large">Comprar</button>
    </div>

</div>
@endsection