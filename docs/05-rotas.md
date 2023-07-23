# Routes Laravel

Rotas é o inicio do fluxo da aplicação é onde é feita a requisição feita pelo usuário.

Quando iniciamos o projeto laravel vimos que faz a requisição na rota principal que é o `" / "`.

`curso-laravel\routes\web.php`

```php
<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
```

Isso redenriza a View que está:

`curso-laravel\resources\views\welcome.blade.php`.

como criar rotas:

1. Chamamos a class estática Route e um método http e no parametro definimos o nome da rota e uma função de callback e depois retornar uma view e depois criar a view.

Exemplo:

```php
Route::get('/empresa', function() {
    return view('empresa');
});
```

### Short syntax

```php
Route::view('/empresa', 'empresa');
```

2. Agora criamos a view `curso-laravel\resources\views` com o tipo de extensão `.blade.php`.

Exemplo:

![create-view](/img/createview.png)

saida:

![view](/img/resultView.png)

## Tipos de rotas(any e match)

`any()` aceita todos tipos de acesso http.

Exemplo:

```php
Route::any('/any', function() {
    return "Permite todo tipo de acesso http (put, delete, get, post)";
});
```

`match()` permite rotas que são definidas dentro do parametro do metodo

exemplo:

```php
Route::match(['get', 'post'], '/match', function() {
    return "Permite apenas acessos http definidos
    ";
});
```

## Rotas - Passagem de Parâmetro

Podemos definir parametros na URL, para controlar a rota quando for capturada pela função ou metodo para retorna uma uma resposta dessa solicitação.

Exemplo:

```php
Route::get('/produto/{id}/{cat?}', function($id, $cat = "" ) {
    return "O id do produto : $id <br /> A Categoria do produto: $cat";
});
```

Se você acessar a URL `/produto/123`, o resultado será:

```csharp
O id do produto é: 123
A Categoria do produto:
```

Se você acessar a URL `/produto/456/Eletrônicos`, o resultado será:

```cshatrp
O id do produto é: 456
A Categoria do produto: Eletrônicos
```

> O valor do parâmetro `cat` será definido como uma `string` vazia, pois é opcional e não foi fornecido na URL.

## Redirecionamento de Rota

Ao prencher uma URL, podemos redirecionar essa url para outra

Exemplo:

```php
Route::get('/sobre', function() {
    return redirect('/empresa');
});
```

Quando acessar `/sobre` você irá para `/empresa`.

### Short Syntax

```php
Route::redirect('/sobre', '/empresa');
```

## Rotas Nomeadas

Podemos nomear rotas usando o método `name()` com isso podemos acessar essa rota através de outro Route por exemplo acessar ela no redirecionamento.

Exemplo:

```php
Route::get('/news', function() {
    return view('news');
})->name('noticias');

Route::get('/novidades', function() {
    return redirect()->route('noticias');
});
```

## Grupos de Rotas

Podemos criar grupos de rotas evitando repetições de códigos onde definimos um prefixo dessa rota exemplo `admin/..` e por fim cadeamos dentro do método `group()` as rotas seguidas desse prefixo.

Exemplo:

```php
Route::prefix('/admin')->group(function() {
    Route::get('dashboard', function() {
        return 'dashboard';
    });

    Route::get('users', function() {
        return 'users';
   });

   Route::get('clientes', function() {
        return 'clientes';
   });
});
```

Podemos criar também grupos em vez de utilizar o método `prefix()` utilizar o método `name()` isso ajudará caso o nome da rota seja alterada.

Exemplo:

```php
Route::get('/', function () {
    return redirect()->route('admin.clientes');
});

Route::name('admin.')->group(function() {
    Route::get('admin/dashboard', function() {
        return 'dashboard';
    })->name('dashboard');

    Route::get('admin/users', function() {
        return 'users';
   })->name('users');

   Route::get('admin/clientes', function() {
        return 'clientes';
   })->name('clientes');
});
```

### Utilizando `prefix` e `name` Juntos

Para utilizar os dois métodos fazemos da seguinte forma em vez de chamar um método `prefix()` ou `name()` nós defimos ela dentro do método `group()` como um array.

Exemplo: 

```php
Route::get('/', function () {
    return redirect()->route('admin.clientes');
});

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.' // dentro do group o name é o as
], function () {
    Route::get('dashboard', function () {
        return 'dashboard';
    })->name('dashboard');

    Route::get('users', function () {
        return 'users';
    })->name('users');

    Route::get('clientes', function () {
        return 'clientes';
    })->name('clientes');
});
```
