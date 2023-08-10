@extends('layout.layout')
@section('title', 'HOME')
@section('conteudo')

    <h4 class="row container left"> Seu carrinho possui {{ $items->count() }} </h4>
    <div class="row container">
        <table class="striped">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td><img src="{{ $item->attributes->image }}" alt="" class="responsive-img circle"  width="70"></td>
                        <td>{{ $item->name }}</td>
                        <td>R$ {{ number_format($item->price, 2, ",", ".") }}</td>
                        <td><input style="width: 40px;" class="white center" type="number" name="quantity" value="{{ $item->quantity }}"></td>
                        <td><a class="btn-floating waves-effect waves-light orange"><i class="material-icons">refresh</i></a>
                        </td>
                        <td><a class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row container center">
        <button class="btn  waves-effect waves-light blue"> Continuar comprando <i class="material-icons right">arrow_back</i></button>
        <button class="btn waves-effect waves-light red"> Limpar Carrinho <i class="material-icons">clear</i></button>
        <button class="btn waves-effect waves-light green"> Finalizar pedido <i class="material-icons">check</i></button>
    </div>
@endsection
