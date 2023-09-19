# Filmes - Pior Filme do Golden Raspberry Award

## Sobre o Projeto

Aplicação backend + frontend
- As instruções do projeto não diz se pode utilizar framework como o laravel, que seria mais produtivo para criar esta aplicação.
  Optei de fazer com php puro pois explora mais o conhecimento na linguagem, organização de codigo, criação de rotas, acesso a banco de dados, etc.
- O frontend está utilizando basicamente jquery e bootstrap.

## Pré-requisitos

- PHP 8.1 ou superior
- Composer (https://getcomposer.org/) instalado
- Servidor Web (Exemplo: PHP's Built-in Server)

## Instalação

1. Clone o repositório do GitHub.
2. Acesso e terminal e navegue até o diretório do projeto.
3. Use o composer para instalar as depencias: `composer install`
4. No terminal navegue até o diretório "public" do projeto e "suba" o servidor web com a aplicação na porta 7000: `php -S localhost:7000`
5. A aplicação vai estar disponível na seguinte url: `http://localhost:7000`
6. Pronto.

## Comportamento da Aplicação

1. Ao carregar a página inicial (Dashboard), o ajax faz uma requisição (GET) para api de filmes.
2. Caso não exista filmes no banco de dados (SQLite), a aplicação é redirecionado a página onde é realizada a importação dos filmes via arquivo CSV fornecido.
   Obs.: O arquivo CSV de filmes está localizado no seguinte caminho: `./filmes/src/Database/movielist.csv`
3. Após a importação, a lista de filmes importados é exibido na página.
4. Retornando ao Dashboard o ajax/api vai retornar o intervalo dos produtores vencedores.

## Testes com PHPUnit

Para executar os testes de integração com o PHPUnit, você pode usar os seguintes comandos no terminal:
 
1. Grupo "import": `./vendor/bin/phpunit --testsuite=import`
2. Grupo "api": `./vendor/bin/phpunit --testsuite=api`


	

 
