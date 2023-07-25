# Praticando

1. Criando tabela: migration `produtos`.

    ```csharp
    php artisan make:migration produtos --create=produtos
    ```

2. Criando colunas da migration criada.

    ```php
    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {

        public function up(): void
        {
            Schema::create('produtos', function (Blueprint $table) {

                $table->id();
                $table->string('nome');
                $table->text('descricao');
                $table->double('preco', 10, 2);
                $table->string('slug');
                $table->string('imagem')->nullable();

                // Criando Relaciomento de tabelas
                $table->foreign('id_user') // Definindo a coluna da chave estrangeira
                    ->references('id') // Indicando a refencia com a chave primária
                    ->on('users') // Apontando o relaciomento com a tabela users
                    ->onDelete('cascade') // Método caso apague de uma tabela, a outra também será apagada
                    ->onUpdate('cascade'); // Método caso altere de uma tabela, a outra também será altera

                $table->foreign('id_categoria')
                    ->references('id')
                    ->on('categorias')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
                
                $table->timestamps(); // método para criar as colunas create_at and update_at
            });
        }

        public function down(): void
        {
            Schema::dropIfExists('produtos');
        }

    };
    ```

    - OBSERVAÇÃO

    *Migration `users` está definida pelo proprio laravel assim quando criamos o nosso projeto.*

3. Criando Model produto para representar as entidades.

    ```csharp
    php artisan make:model Produto
    ```

    - criando model, controller e migration `categorias` juntos.

    ```csharp
    php artisan make:model Categoria --migration --controller --resource
    ```

    - OBSERVAÇÃO

    *Note que o laravel detecta o model e cria uma migrations ja com o nome no plural de forma inteligente.*

    ![model-migration](/img/model-migration.png)

4. Definindos colunas da tabela `categorias`.

    ```php
    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {

        public function up(): void
        {
            Schema::create('categorias', function (Blueprint $table) {
                $table->id();
                $table->string('nome');
                $table->text('descricao');
                $table->timestamps();
            });
        }

        public function down(): void
        {
            Schema::dropIfExists('categorias');
        }
    };

    ```

    > *ERROR NA ORDEM NA EXECUÇÃO DE MIGRATION* : Renomear o arquivo para que produto seja executado pelo ultimo, por conta das criação de chaves estrangeiras.

5. Execute migrate.

    ```csharp
    php artisan migrate:fresh
    ```
