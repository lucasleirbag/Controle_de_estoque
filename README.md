## *:information_source: Inventoryweb*
Este aplicativo pode ser usado para controlar o estoque de produtos que você possui, tornando as transações de entrada e saída de produtos claras e facilitando o controle desses produtos.

Para a aparência, já integrei o modelo de administração 'bootstrap v5' chamado 'sash admin'.

## *:sparkles: Recursos*
* **Painel de Controle**
* **Tipos de Produtos**
* **Unidades de Medida**
* **Marcas de Produtos**
* **Produtos**
* **Clientes**
* **Entrada de Produtos**
* **Saída de Produtos**
* **Relatório de Entrada de Produtos**
* **Relatório de Saída de Produtos**
* **Relatório de Estoque de Produtos**
* **Configurações do Site**
* **Configurações de Permissões de Usuários por Função**
* **Configurações de Menu (adicionar ou remover menus)**

## *:electric_plug: Plugins*
* **Yajra Datatables**
* **SweetAlert**
* **jQuery**
* **Seletor de Data e Hora**

## *:gear: Requisitos*
<p>
<img alt="imagem" src="https://img.shields.io/badge/PHP%20-%5E8.1-green"/>
<img alt="imagem" src="https://img.shields.io/badge/Node JS%20-%5E16.14.0-green"/>
<img alt="imagem" src="https://img.shields.io/badge/Npm%20-%5E8.3.1-green"/>
<img alt="imagem" src="https://img.shields.io/badge/Composer%20-%5E2.3.9-green"/>
</p>

## *:rocket: Instalação*
#### :arrow_right: Clonar Projeto / Baixar Arquivo
Clone o projeto usando o terminal `gitbash` com o seguinte comando:

`git clone git@github.com:radhiant/laravel-inventoryweb.gi`

Ou você pode clicar no botão de download (ZIP) e extrair o arquivo.

#### :arrow_right: Criar Banco de Dados
Crie um banco de dados chamado `db_inventoryweb`.

#### :arrow_right: Configurar ENV
Renomeie o arquivo de `env.development` para `.env`.

Configure `DB_DATABASE`, `DB_USERNAME` e `DB_PASSWORD` no arquivo `.env` de acordo com o nome do banco de dados MySQL de vocês.

#### :arrow_right: Configuração
Abra o terminal na pasta do projeto e execute os seguintes comandos:
`composer install`

#### :arrow_right: Importar Banco de Dados
Importe o arquivo de banco de dados `db_inventoryweb.sql` localizado na pasta `database/db` para o phpMyAdmin.

#### :arrow_right: Executar o Aplicativo
`php artisan serve`

Copie e cole `http://127.0.0.1:8000/` em seu navegador.

#### :arrow_right: Login Padrão
Nome de usuário: `superadmin` Senha: `12345678`
<br>
Nome de usuário: `admin` Senha: `12345678`
<br>
Nome de usuário: `operator` Senha: `12345678`
<br>
Nome de usuário: `manajer` Senha: `12345678`
