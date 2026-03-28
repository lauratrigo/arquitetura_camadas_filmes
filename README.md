# 🎬 Sistema de Cadastro de Filmes

Esta é uma aplicação web desenvolvida com **PHP** e **Slim Framework**, estruturada com **arquitetura em camadas**. O projeto foi criado como parte de uma atividade de desenvolvimento backend, com foco em boas práticas de organização de código, separação de responsabilidades e uso de padrões de desenvolvimento.

## 🛠 Tecnologias Usadas

- **PHP 8+**
- **Slim Framework**
- **Composer**
- **MySQL**
- **Insomnia** (para testes de requisições HTTP)

![PHP Badge](https://img.shields.io/badge/PHP-8.2-blue?logo=php&logoColor=white)
![Slim Badge](https://img.shields.io/badge/Slim_Framework-4.12.0-blue?logo=slim&logoColor=white)
![MySQL Badge](https://img.shields.io/badge/MySQL-8.0-blue?logo=mysql&logoColor=white)
![Composer Badge](https://img.shields.io/badge/Composer-2.6-blue?logo=composer&logoColor=white)

## 💡 Objetivo

O objetivo deste projeto é desenvolver um sistema web para gerenciar **Diretores** e seus **Filmes**, aplicando uma **arquitetura em camadas** (Router → Middleware → Controller → Service → DAO → Model → View) e boas práticas de desenvolvimento, como:

- Separação de responsabilidades  
- Injeção de dependências  
- Regras de negócio isoladas na camada Service  
- Acesso ao banco de dados encapsulado na camada DAO  

O sistema possui duas entidades principais:  

- **Diretor**: representa o responsável pelos filmes.  
- **Filme**: representa um filme cadastrado no sistema.  
- Relacionamento: um **Diretor** pode ter muitos **Filmes** (1:N).

## 🚀 Funcionalidades

- **Gerenciar Diretores**: criar, listar, atualizar e remover diretores.  
- **Gerenciar Filmes**: criar, listar, atualizar e remover filmes, associados a um diretor específico.  

## 📋 Pré-Requisitos

Antes de rodar a aplicação, certifique-se de ter os seguintes itens instalados:

- [PHP 8+](https://www.php.net/downloads)
- [Composer](https://getcomposer.org/download/)
- [MySQL](https://dev.mysql.com/downloads/)
- Servidor HTTP (Apache, Nginx ou PHP built-in server)

## 📦 Como Executar o Projeto

### Passo 1: Clone o repositório

```bash
git clone https://github.com/lauratrigo/arquitetura_camadas_filmes.git
cd arquitetura_camadas_filmes
```

### Passo 2: Instale as dependências com Composer

```bash
composer install
```

### Passo 3: Configure o banco de dados

  - Crie um banco de dados MySQL chamado **filmes_db**.
  - Configure as credenciais no arquivo **.env**:
    ```bash
    DB_HOST=localhost
    DB_NAME=filmes_db
    DB_USER=seu_usuario
    DB_PASS=sua_senha
    ```

### Passo 4: Execute a aplicação

```bash
php -S localhost:8000 -t public
```
- A aplicação estará disponível em http://localhost:8000

### Passo 5: Teste as rotas

- Use o Insomnia ou Postman para enviar requisições HTTP para as rotas definidas em FilmeRouter e DiretorRouter.


## 📂 Estrutura do Projeto

```
arquitetura_camadas_filmes/
├── src/
│   ├── router/
│   │   ├── FilmeRouter.php
│   │   └── DiretorRouter.php
│   ├── middleware/
│   │   ├── FilmeMiddleware.php
│   │   └── DiretorMiddleware.php
│   ├── controller/
│   │   ├── FilmeController.php
│   │   └── DiretorController.php
│   ├── service/
│   │   ├── FilmeService.php
│   │   └── DiretorService.php
│   ├── dao/
│   │   ├── FilmeDAO.php
│   │   └── DiretorDAO.php
│   ├── model/
│   │   ├── Filme.php
│   │   └── Diretor.php
│   └── view/
│       └── templates/ (HTML ou arquivos de resposta)
├── public/
│   └── index.php
├── vendor/
├── .env
├── composer.json
└── README.md
```

## 📜 Licença

Este projeto está licenciado sob a Licença MIT - veja o arquivo LICENSE para mais detalhes.

## 🤝 Agradecimentos
Este projeto foi desenvolvido por Laura Trigo como parte de uma atividade da disciplina de programação para a internet, aplicando conceitos de arquitetura em camadas e boas práticas de desenvolvimento backend em PHP com Slim Framework.
