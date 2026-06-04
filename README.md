# PHP Management System

Sistema web desenvolvido em PHP e MySQL com autenticação de usuários, controle de login e gerenciamento de serviços.

---

## Funcionalidades

- Sistema de login com autenticação e controle de acesso
- Diferentes tipos de usuário (cliente e funcionário)
- Cadastro e visualização de pedidos de serviço
- Painel administrativo para funcionários
- Busca de usuários por nome ou CPF

---

## Tecnologias utilizadas

- PHP
- MySQL
- HTML
- CSS
- Bootstrap
- JavaScript

---

## Como executar o projeto

1. Instale o XAMPP
2. Inicie o Apache e MySQL
3. Coloque o projeto dentro da pasta `C:\xampp\htdocs`
4. Importe o arquivo `uml.sql` no http://localhost/phpmyadmin/
5. Acesse pelo navegador: http://localhost/Uml/

---

## Banco de dados

O projeto utiliza um banco MySQL contendo tabelas como:

- cliente
- funcionario
- servico
- contrato

O arquivo `.sql` está incluído no projeto para importação.

---

## Usuários de teste (exemplo)

Todos os dados, incluindo CPF e senhas, são fictícios e usados apenas para demonstração.

demonstração:

- Funcionário:
  - CPF: 11122233312
  - Senha: 123123123

---

## Observação

Projeto desenvolvido para fins educacionais com foco em aprendizado de PHP, MySQL, autenticação e CRUD básico.
