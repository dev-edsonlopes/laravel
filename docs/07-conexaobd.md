# Conexão com o Banco de Dados

## Aquirvo `.env`

Onde fica toda, parte sensiveis da aplicação e lá tem uma sessão de configuração do BD, com alguns valores padrão.

![bd-env](/img/env_bd.png)

## Arquivo `config\database.php`

Esse arquivo fica as conexões de varios bancos, "preset-ado" dentro de um array, caso não seja definido o valor no arquivo `.env`, ele utiliza o valor default.

## Criando um banco de dados

````sql
CREATE DATABASE `cursolaravel`;
```

Agora no arquivo .env alterar o nome do banco.

```yaml
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cursolaravel
DB_USERNAME=root
DB_PASSWORD=
```
