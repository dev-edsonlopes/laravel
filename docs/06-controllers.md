# Controllers

A camada responsavel pela lógica e toda regra de négocio da aplicação.

## Como criar Controllers

1. Primeiro definimos a rota do controler e por volta do `[NomeController::class, 'nomeMetodo']`. 

`curso-laravel\routes\web.php`

```php
Route::get('/', [ProdutoController::class, 'index'])->name('produto.index');
```

> Obs: é recomendado criar um nome para as rotas.

2. Via comando artisan criamos controller que fica em `curso-laravel\app\Http\Controllers`.

```csharp
php artisan make:controller ProdutoController
```

Isso irá criar um arquivo controller com a estrutura do código.

![estrutura-controller](/img/estruturaController.png)

3. Pra finalizar criaremos o método e tem que ser o mesmo nome que foi declarado quando criamos a rota do controller e utilizar o namespace do arquivo do controller na pasta de rotas para utilizarmos a class criada.

`curso-laravel\app\Http\Controllers\ProdutoController.php`

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoController extends Controller 
{
    public function index() {
        return "index";
    }
}
```

`curso-laravel\routes\web.php`

```php
use App\Http\Controllers\ProdutoController;
```

## Controller - Passagem de Parâmetro

Podemos definir parametros na URL, para controlar a rota quando for capturada pelo metodo criado no controller para retorna uma uma resposta dessa solicitação.

Exemplo:

1. Definimos o parametro na rota dentro das chaves `{}`

`curso-laravel\routes\web.php`

```php
Route::get('/produto/{id?}', [ProdutoController::class, 'showId'])->name('produto.show');
```

> Observe que foi colocado dentro do parametro uma `?` isso indica que é opcional informar o valor do parâmetro na URL com isso evita o erro 404.

2. Criaremos o métdo dessa class.

```php
use Illuminate\Http\Request;

class ProdutoController extends Controller 
{
    public function show($id = 0) {
        return 'id: '.$id;
    }
}
```

> Observe que no parametro foi definido um valor padrão, é preciso fazer isso para não da erro caso não tenha valor na URL, isso evita o erro da espera de um argumento.

## Resource Controller

O laravel disponibiliza um recurso agil para criarmos um controller com métodos gerados para fazer manipulação no banco de dados.

1. Via comando artisan criaremos o controller da seguinte forma

```csharp
php artisan make:controller ProdutoController --resource
```

> Isso o framework laravel irá gerar os métodos CRUD automaticos:

`curso-laravel\app\Http\Controllers\ProdutoController.php`

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

```

2. Agora criamos a rota desse Resource em `curso-laravel\routes\web.php`.

```php
use App\Http\Controllers\ProdutoController;

Route::resource('produtos', ProdutoController::class);
```

> Isso irá criar todas as rotas criada pelo `resource`

Para visualizar as rotas e os métodos no via comando digite `php artisan route:list`

![route-list](/img/routelist.png)
