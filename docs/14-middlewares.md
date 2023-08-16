# Middleware

São filtros de requisição HTTP, fornecido pelo laravel com vem diversos filtros.

![midleware](/img/midleware.png)

## Kernel

é onde os middlewares são definidos e eles são globais

## Criando midlewares

1. etapa

    ```csharp
        php artisan make:middleware CheckEmail
    ```

2. Estapa registrar o middleware criado no Kernel `$routeMiddleware`.

```csharp
      'checkemail' => \App\Http\Middleware\CheckEmail::class,
```

