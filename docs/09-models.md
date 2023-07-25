# Model

O model é uma representação de uma entidade do banco de dados.

## Criando um model

```csharp
php artisan make:model Produto
```

### Testando na prática

1. vamos add um registro na tabela

    ```sql
    INSERT INTO 
        produtos 
            (`nome`, `created_at`, `updated_at`) 
        VALUES 
            ('teste produto', '2023-07-24 17:56:33', '2023-07-24 17:56:34');
    ```

2. Em `\Http\Controllers\ProdutoController.php` vamos mostrar na rota o valor

    ```php
    public function index()
        {
        $produtos = \App\Models\Produto::all();
        return dd($produtos);
        }
    ```

    ![ddprodutos](/img/ddprodutos.png)

    Método `all()`, é o método do eloquent que é o ORM do laravel
    O -> Object
    R -> Relational
    M -> Model

    Ela relaciona a tabela do banco de dados com a class, o model Produto representa a tabela produtos do banco, o Laravel detectou automaticamente a pluralização conseguindo fazer a relação com a tabela produtos do banco de dados.

    > Pode ocorrer um erro caso o laravel não consiga entender a pluralização então podemos especificar, no arquivo `\app\Models\Produto.php` criado.

    Exemplo:

    ```php
    <?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Produto extends Model
    {
        use HasFactory;

        // Expecificando a tabela.
        protected $table = 'produtos';
    }
    ```
