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
