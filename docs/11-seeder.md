# Seeder

Seeder é um recurso do laravel para inserir registro de uma tabela.

## Criando uma seeder

```csharp
php artisan make:seeder UserSeeder
```

## Inserir dados

1. Na path `curso-laravel\app\Models\User.php` tem um atributo `$fillable` tipo array onde esta descrito todas as colunas do banco.

2. Em `curso-laravel\database\seeders`:

    1. Primeiro importamos o Model.

        ```php
        use App\Models\User
        ```

    2. há uma classe com um método que vamos armazenar os dados dentro de cada chave do array do atributo $fillable

        ```php
        class UsersSeeder extends Seeder
        {
            public function run(): void
            {
                User::create([
                    'fistName' => 'Edson',
                    'lastName' => 'Junior',
                    'email' => 'edson.junior@mobs2.com',
                    'password' => bcrypt('12345678'), // Criptar a senha
                ]);
            }
        }
        ```

3. No arquivo `curso-laravel\database\seeders\DatabaseSeeder.php` vamos chamar um método call() que é onde vai ficar todas as seeders.

    Exemplo:

    ```php
    <?php

    namespace Database\Seeders;

    use Illuminate\Database\Seeder;

    class DatabaseSeeder extends Seeder
    {

        public function run(): void
        {
            $this->call([
                // Classes das Seeders
                UsersSeeder::class,
            ]);

        }
    }

    ```

4. Execute a seeder

    ```csharp
    php artisan db:seeds
    ```

    ![result-inserção](/img/insertSeeder.png)
