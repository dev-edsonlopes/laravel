# Views

Responsavel pela visibilidade da aplicação.

extensão `.blade.php` é o sistema do laravel para carregar templates.

PRA CARREGAR A VIEW definimos a rota em routes/web.php

e na rota criar na class do controller a gente retorna a view na função

Exemplo:

`routes/web.php`

```php
use App\Http\Controllers\ProdutoController;
Route::resource('produtos', ProdutoController::class);
```

`Controllers\ProdutoController.php`

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        return view('news');
    }
}
```

Como carregar dados na view

Criamos uma variavel atribuimos uma valor a ela, e pra passar pra nossa views adicionamos mais um parametro no retorno da função em array o nome da chave e a variavel, depois é chamar a variavel na view entre `{{}}`.

Exemplo:

`Controllers\ProdutoController.php`

```php
class ProdutoController extends Controller
{
    public function index()
    {
        $nome = "Edson";
        $idade = "23";
        $html = "<h1> Testando </h1>";
        return view('news', [
            'nome' => $nome,
            'idade' => $idade,
            'html' => $html
        ]);
    }
}

```

`\views\news.blade.php`

```php
<h1> News </h1>

<p>Meu nome é {{ $nome }} e tenho {{ $idade }} anos de idade.</p>
```

> Meu nome é Edson e tenho 23 anos de idade.

## Blade

### DIRETIVAS (SECTION YIELD E EXTENDS)

controle de layout do laravel

`@yield` -> Diretiva usada pra exibir o conteúdo de uma determinada seção.

`@extends` -> Diretiva para especificar qual layout a exibição filho deve "herdar".

`@section` -> Diretiva, como o nome indica, define uma seção de conteúdo.

### Comentários e operador ternário

```php
@extends('layout.layout')
@section('title', 'HOME')
@section('conteudo')
{{-- ISSO É UM Comentário --}}

{{-- Operador Ternario --}}
<p>{{ isset($nome) ? 'Existe' : 'Não existe'}}</p>

{{-- Definindo valores padrão em variáveis Indefinidas --}}
{{ $teste ?? 'padrão'}}
@endsection
```

### Estrutura de controle

### IF e UNLESS

```php
@extends('layout.layout')
@section('title', 'HOME')
@section('conteudo')
<h1>Home Page</h1>
{{-- ESTRUTURA DE CONTROLE --}}

@if($nome == 'Edson')
    true
@else    
    false    
@endif

@endsection
```

> true


```php
@extends('layout.layout')
@section('title', 'HOME')
@section('conteudo')
<h1>Home Page</h1>
{{-- ESTRUTURA DE CONTROLE --}}

@unless($nome == 'Edson')
    true
@else    
    false    
@endunless

@endsection
```

> false

#### SWITCH

```php
@extends('layout.layout')
@section('title', 'HOME')
@section('conteudo')
<h1>Home Page</h1>
{{-- ESTRUTURA DE CONTROLE --}}

@switch($idade)
    @case(23)
        Idade correspondente
        @break
    @case(29)
        Idade não corresponde
        @break
    @default
        default
@endswitch
```

> Idade correspondente

### Estrutura de Repetição

#### For

```php
@for ($i = 0; $i < 10; $i++)
    Valor: {{ $i }} <br />
@endfor
```

```csharp
Valor: 0
Valor: 1
Valor: 2
Valor: 3
Valor: 4
Valor: 5
Valor: 6
Valor: 7
Valor: 8
Valor: 9
```

#### WHILE

```php
@extends('layout.layout')
@section('title', 'HOME')
@section('conteudo')
<h1>Home Page</h1>
{{-- ESTRUTURA DE CONTROLE --}}

@php
    $i = 0;
@endphp

@while ($i <= 10)
    valor = {{ $i }} <br />
    @php $i++ @endphp
@endwhile

@endsection
```

```csharp
valor = 0
valor = 1
valor = 2
valor = 3
valor = 4
valor = 5
valor = 6
valor = 7
valor = 8
valor = 9
valor = 10
```

#### Foreach

```php
@extends('layout.layout')
@section('title', 'HOME')
@section('conteudo')
<h1>Home Page</h1>
{{-- ESTRUTURA DE CONTROLE --}}

@php
    $frutas = array('Goiba', 'Banana', 'Maçã');
@endphp

@foreach ($frutas as $fruta)
    {{ $fruta }} <br />
@endforeach
@endsection
```

```csharp
Goiba
Banana
Maçã
```
