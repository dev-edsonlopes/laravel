# Migrations

Usamos para manipular as tabelas do banco de dados.

O proprio laravel fornece algumas estruturas pre moldada, para serem utilizadas.

caminho: `curso-laravel\database\migrations`;

![migrations-laravel](/img/migrations.png)

Observando um pouco a estrutura que foi fornecido pelo laravel, percembemos que há dois métodos criados, `up()` e a `down()`, Quando executamos a migrations ela a o método `up()` é acionado, e quando revertemos a migrations o método `down()` é acionado.

## Exetucando as migrations

Comando para executar as migrations.

```csharp
php artisan migrate
```

Resultado: 

![exec-migrate](/img/execMigrate.png)

SGBD

![resultado-sgdb](/img//resSGDB.png)

### Tabela Migrations

Note que há uma tabela dentro do banco chamada `migrations` essa tabela é responsavel por controlar as migrações.

![regis-migration](/img/regisMigrations.png)

- Comando para desfazer a ultima migrate

```csharp
php artisan migrate:rollback
```

Depois que executar o comando ele desfaz toda a criação migrate.

![rollback-migrate](/img/rollbackMigrate.png)

- Comando para ver os status do migrate

```csharp
php artisan migrate:status 
```

![status-migrate](/img/statusMigrate.png)

## Criar Migrations

- comando

```csharp
php artisan make:migration nome_migrate
```

- !important

Se criarmos a migration com o nome seguido por sufixos recomendado laravel `create_nomeTabela_table` ou ```nomeMigrations --create=nomeTabela```, a migration criada iria vir uma estrutura premoldado faltando apenas adicionar as colunas da tabela.

exemplo:

```csharp
php artisan make:migration create_produtos_table
```

Ou

```csharp
php artisan make:migration produtos --create=produtos
```

## Edit and Delete Migrations

### Editar

Para renomear a tabela do banco primeiro iremos criar uma migration `alterar_nome_tabela`

```csharp
php artisan make:migration alterar_nome_tabela_produtos
```

Na migrations criada digitando chamamos o método `rename()` para alterarmos o nome da tabela.

```php
  public function up(): void
    {
        Schema::rename('produtos', 'produto');
    }
```

depois desse método criado executamos a migration no terminal

```csharp
php artisan migrate
```

> assim o nome será atualizado.

### Apagar

Criaremos novamente uma nova migration

```csharp
php artisan make:migration excluir_tabela_produto
```

Na migrations criada digitando chamamos o método `drop()` ou `dropIfExist()` para apagar a tabela do banco.

```php
 public function up(): void
    {
        Schema::dropIfExists('produto');
    }
```

depois desse método criado executamos a migration no terminal

```csharp
php artisan migrate
```

> assim a tabela será apagada.

## Migration Rename Collumn

Para modificar a coluna do banco de dados temos que instalar um pacote Doctrine DBAL

```csharp
composer require doctrine/dbal
```

também deve adicionar a seguinte configuração ao `config/database.php` arquivo de configuração do seu aplicativo:

```php
use Illuminate\Database\DBAL\TimestampType;
 
'dbal' => [
    'types' => [
        'timestamp' => TimestampType::class,
    ],
],
```

Vamos adicionar mais duas colunas na tabela produtos `nomee`,  `nomecompleto`, para testar, note que `nomee` ta errado proprositalmente.

`curso-laravel\database\migrations\2023_07_24_121629_produtos.php`

```php
  public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nomee');
            $table->string('nomecompleto');
            $table->timestamps();
        });
    }
```

agora vamos dar um fresh no branco para apagar as migrations e executar novamente.

```csharp
php artisan migrate:fresh
```

agora vamos renomear as colunas:

1.  criar uma migrations  update_produtos

```csharp
php artisan make:migration update_produtos
```

2. agora criamos o método up().

```php
    public function up(): void
    {
        Schema::table('produtos', function(Blueprint $table) {
            $table->renameColumn('nomee', 'nome');
            $table->dropColumn('nomecompleto');
        });
    }
```

3. Execute o comando migrate

```csharp
php artisan migrate
```
