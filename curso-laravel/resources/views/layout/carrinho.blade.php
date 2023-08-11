@extends('layout.layout')
@section('title', 'HOME')
@section('conteudo')

    <div class="row container">
        @if ($message = Session::get('add'))
            <div class="card green">
                <div class="card-content white-text">
                    <p>{{ $message }}</p>
                </div>
            </div>
        @else
            @if ($message = Session::get('delete'))
                <div class="card red">
                    <div class="card-content white-text">
                        <p>{{ $message }}</p>
                    </div>
                </div>
            @else
                @if ($message = Session::get('update'))
                    <div class="card yellow">
                        <div class="card-content white-text">
                            <p>{{ $message }}</p>
                        </div>
                    </div>
                @endif
            @endif
        @endif
        <h4 class="row container left"> Seu carrinho possui {{ $items->count() }} </h4>
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
                        <td><img src="{{ $item->attributes->image }}" alt="" class="responsive-img circle"
                                width="70">
                        </td>
                        <td>{{ $item->name }}</td>
                        <td>R$ {{ number_format($item->price, 2, ',', '.') }}</td>
                        <form action="{{ route('atualizaCarrinho') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <td>
                                <input style="width: 40px;" class="white center" type="number" name="quantity"
                                    value="{{ $item->quantity }}">
                            </td>
                            <td>
                                {{-- BTN UPDATE --}}
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <button class="btn-floating waves-effect waves-light orange">
                                    <i class="material-icons">refresh</i>
                            </td>
                            </button>
                        </form>

                        {{-- BTN Remove --}}
                        <td>
                            <form action="{{ route('removeCarrinho') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <button class="btn-floating waves-effect waves-light red">
                                    <i class="material-icons">delete</i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row container center">
        <button class="btn  waves-effect waves-light blue"> Continuar comprando <i
                class="material-icons right">arrow_back</i></button>
        <button class="btn waves-effect waves-light red"> Limpar Carrinho <i class="material-icons">clear</i></button>
        <button class="btn waves-effect waves-light green"> Finalizar pedido <i class="material-icons">check</i></button>
    </div>
@endsection
