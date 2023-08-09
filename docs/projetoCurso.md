# Projeto do Curso Laravel

## Implementação do Materialize

1. na View na pasta `\views\layout\layout.blade.php` adcionaremos link CDN's do Materialize.

```html
 <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

 <!-- Compiled and minified JavaScript -->
       <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
            
```

## Listar Produtos

- Em `ProdutoController.php` Iremos adicionar o método para carregar todos os atributos do banco na view.

1. Iremos importar o Model da da tabela produto:

    ```php
    use App\Models\Produto;
    ```

2. Agora criaremos o método

    ```php
    class ProdutoController extends Controller {
        public function index() {
               $produtos = Produto::all();
               return view('layout/home', compact('produtos'));
        }
    }
    ```

3. Agora para listar na pasta `\views\layout\home.blade.php`.

    ```php
       @extends('layout.layout')
       @section('title', 'HOME')
       @section('conteudo')
       <div class="row container">
              @foreach ($produtos as $produto)
              <div class="col s12 m4">
              <div class="card">
                     <div class="card-image">
                     <img src="{{ $produto->imagem }}">
                     <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">visibility</i></a>
                     </div>
                     <div class="card-content">
                     <span class="card-title">{{Str::limit($produto->nome, 20)}}</span>
                     <p>{{Str::limit($produto->descricao, 35)}} </p>
                     </div>
                     </div>
              </div>
              @endforeach
       </div>
       @endsection
    ```

## Paginação

Para evitar de carregar muitos dados em uma unica página podemos utilizar o método `paginate` em vez do `all()`.

1. Mudança de método para listar os produtos:

    ```php
    class ProdutoController extends Controller {
       public function index() {
              $produtos = Produto::paginate(3);
              return view('layout/home', compact('produtos'));
       }
    }
    ```

2. Colocando a Páginação na Home

    ```php
    <div class="row center">
        {{$produtos->links('custom.pagination')}}
    </div>
    ```

> obs.: O framework laravel a estilização é baseado em tailwind, para adaptar o projeto que ta sendo feito com materialize baixaremos um arquivo para customizar o numeros de páginas

`\views\custom\pagination.blade.php`

```php
@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><i class="material-icons">chevron_left</i></li>
        @else
            <li class="waves-effect"><a href="{{ $paginator->previousPageUrl() }}"><i class="material-icons">chevron_left</i></a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled">{{ $element }}</li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active">
                            <a>{{ $page }}</a>
                        </li>
                    @else
                        <li class="waves-effect"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="waves-effect"><a href="{{ $paginator->nextPageUrl() }}"><i class="material-icons">chevron_right</i></a></li>
        @else
            <li class="disabled"><a href="{{ $paginator->nextPageUrl() }}"><i class="material-icons">chevron_right</i></a></li>
        @endif
    </ul>
@endif
```
