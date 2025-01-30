# Monitoramento Financeiro

## Descrição

O **Monitoramento Financeiro** é uma aplicação web desenvolvida para criar transações financeiras, categorizando-as como **receita** ou **despesa**. O sistema permite ao usuário realizar o cadastro, listagem e exclusão de transações, além de gerenciar categorias e visualizar um resumo do seu histórico financeiro.

## Funcionalidades

- **Cadastro de Usuário**: O sistema permite que o usuário se cadastre para acessar o sistema e realizar o gerenciamento das suas finanças. Para isso, o projeto utiliza o Laravel Fortify para autenticação de usuários.
- **Cadastro de Transações**: O usuário pode adicionar transações financeiras, especificando o tipo (receita ou despesa), valor e categoria.
- **Listagem de Transações**: Visualize todas as transações cadastradas com detalhes como categoria, tipo e valor.
- **Deleção de Transações**: O usuário pode excluir transações indesejadas.
- **Cadastro de Categorias**: O sistema permite o gerenciamento de categorias, associando-as a transações específicas.
- **Pesquisa de Categorias**: Busque por categorias específicas para facilitar a organização das transações.

## Tecnologias Utilizadas

- **PHP** ![PHP](https://img.shields.io/badge/-PHP-777BB4?style=flat&logo=php&logoColor=white)
- **Laravel** ![Laravel](https://img.shields.io/badge/-Laravel-FF2D20?style=flat&logo=laravel&logoColor=white)
- **MySQL** ![MySQL](https://img.shields.io/badge/-MySQL-4479A1?style=flat&logo=mysql&logoColor=white)
- **Bootstrap** ![Bootstrap](https://img.shields.io/badge/-Bootstrap-563D7C?style=flat&logo=bootstrap&logoColor=white)
- **Git** ![Git](https://img.shields.io/badge/-Git-F05032?style=flat&logo=git&logoColor=white)
- **Composer** ![Composer](https://img.shields.io/badge/-Composer-2C3A2D?style=flat&logo=composer&logoColor=white)

## Pré-requisitos

Antes de rodar o projeto localmente, é necessário ter as seguintes ferramentas instaladas:

- [PHP](https://www.php.net/downloads) (versão 7.4 ou superior)
- [Composer](https://getcomposer.org/download/)
- [MySQL](https://dev.mysql.com/downloads/)
- [Git](https://git-scm.com/downloads)

## Como Rodar o Projeto

1. **Clonar o Repositório**

   Primeiro, clone o repositório para sua máquina local:

   ```bash
   git clone https://github.com/seu-usuario/monitoramento-financeiro.git
   cd monitoramento-financeiro

2. **Instalar as Dependências**

   Use o Composer para instalar as dependências PHP:

   ```bash
   composer install

3. **Configurar o Banco de Dados**

   Crie um banco de dados MySQL e configure as credenciais no arquivo .env:

   ```bash
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nome_do_banco
   DB_USERNAME=seu_usuario
   DB_PASSWORD=sua_senhao


4. **Rodar as Migrations**

   Após configurar o banco de dados, rode as migrations para criar as tabelas necessárias:

   ```bash
   php artisan migrate

5. **Rodar o Servidor**

   Agora você pode rodar o servidor local:

   ```bash
   php artisan serve
