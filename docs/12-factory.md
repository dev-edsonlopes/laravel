# Factory

Factory é uma class criada no laravel para gerar inserção no banco.

## Criar Factory

```csharp
php artisan make:factory NomeFactory
```

Ao ser criado dentro dentro do arquivo tem o método `definition()` é onde definimos a estrutura para gerar os dados.

```php
public function definition() {
    return [
        'nome' => $this->faker->unique()->word,
        'descricao' => $this->faker->text,
    ];
}
```

`$this->faker` é uma classe que gera registro falsos de forma automática.
`word` obter palavra.
`unique()` Essas palavras serem unicas.

Depois que definir a estrutura, criaremos uma seeder para poder executar a factory

Dentro dele vamos definir a quantidade de criação de registro:

```php
use App\Models\Categoria;s

class CategoriasSeeder extends Seeder
{
    public function run(): void
    {
       Categoria::factory(5)->create();
    }
}
```

Agora é só chamar a class no `DatabaseSeeder.php`
e Execulta logo após.

```csharp
php artisan db:seed
```
