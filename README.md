# Vamos ao que interessa

Este é um projeto realizado em PHP e CodeIgniter 4, apenas acadêmico.
O projeto apresenta um cadastro de noticias, utilizando estilos do bootstrap.

Temos um CRUD de noticias com deleção segura, ou seja uma aplicação que realiza as operações básicas num banco de dados

## CRUD (Create, Read, Update, Delete) 

É um acrônimo para as maneiras de se operar em informação armazenada. É um mnemônico para as quatro operações básicas de armazenamento persistente.
- C - criação ou inclusão
- R - Read ou leitura/pesquisa
- U - update ou Alteração
- D - Deleção ou exclusão

## Configuração Soft Delete

Permite apagar os registros, porém apenas marca como deletado no banco de dados, para isso será realizar a seguintes configurações no Model da aplicação:

```shell
  //CONFIGURA SOFT DELETE
    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    protected $dateFormat ='datetime';
    protected $createdField = 'created_at'; //Qualquer nome 
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
```
Os tres campos criados 'xxx_at' podem ter qualquer nome, devem existir no banco de dados com o mesmo mome, ou seja, se colocar o nome 'deletado_em' no banco de dados deve existir um campo 'deletado_em'.

## Migrates e Seeds

Para criar as tabelas e popular com registros podemos utilizar os comandos 'migrate' e 'db:seed' conforme abaixo:

Estando no prompt de comando já com os arquivos de migrates criados digite:

```shell
php spark migrate
```

Para popular a tabela com alguns registros :

```shell
php spark db:seed nome_do_arquivo_seed
```



Abaixo segue documentação do CodeIgniter 4



# CodeIgniter 4 Application Starter

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](http://codeigniter.com).

This repository holds a composer-installable app starter.
It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [the announcement](http://forum.codeigniter.com/thread-62615.html) on the forums.

The user guide corresponding to this version of the framework can be found
[here](https://codeigniter4.github.io/userguide/).

## Installation & updates

`composer create-project codeigniter4/appstarter` then `composer update` whenever
there is a new release of the framework.

When updating, check the release notes to see if there are any changes you might need to apply
to your `app` folder. The affected files can be copied or merged from
`vendor/codeigniter4/framework/app`.

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Server Requirements

PHP version 7.3 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)
