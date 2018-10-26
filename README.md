# Trabalho final - Fundamentos de Back-end Avançado

Este repositório é dedicado para o trabalho final da disciplina de FBEA.
O aplicativo consiste em dois microserviços que se comunicam. Cada microserviço possui seu banco de dados independente e é capaz de consumir recursos do outro microserviço.

# Apresentação
Como mencionado, existem dois microserviços. 
O primeiro, responsável por manter um catálogo de filmes e reviews foi desenvolvido utilizando `NodeJs` como back-end e o banco de dados `MongoDb`.
O segundo serviço é responsável por disponibilizar sessões de cinema para apresentação dos filmes, venda de ingressos e postagem de comentários e críticas sobre um determinado filme. No desenvolvimento desse projeto, utilizamos o `PHP 7.2.9` e o `SQLite3`

# Primeiros passos

## Clone do repositório
https://github.com/richielybmp/fbea-trabalho-final.git

# Projeto `api-filmes`

## Pacotes utilizados
- body-parser
- express
- express-query-int
- express-register-routes
- http
- mongoose
- nodemon
- request

### Instalando dependências
Através de um terminal, abra o diretório do projeto api-filmes e utilize o comando:
<br /> `npm install` <br /><br />
Serão instalados todos os módulos listados como `dependencies` no arquivo `package.json`.

### Iniciando o MongoDb
 Para iniciar o processo do MongoDb:
<br /> `mongod` <br /><br />

## Executanto o projeto api-filmes
Definimos em `package.json` scripts de utilização do projeto. Para executar em modo de desenvolvedor, utilize o comando:
<br /> `npm run dev` <br /><br />
Para executar normalmente, utilize o comando:
<br /> `npm run start` <br /><br />

## Acessando o serviço
A porta que o serviço estará executando será qualquer que seja a porta da variável de ambiente `process.env.PORT`, ou a porta 3000.
Acesse o endereço a seguir através de alguma ferramenta do estilo [Postman](https://www.getpostman.com/) ou [Swagger Inspector](https://inspector.swagger.io/builder) :
<br /> `http://localhost:3000/api/filmes` <br />

Se tudo ocorrer perfeitamente, será mostrado o log no console:
```
Api-Filmes executando na porta 3000!
Conectado no banco de dados db_apiFilmes
```

# Projeto `api-ri`

## Requerimentos
- Apache 2.4
- PHP 7.2.9
- SQLite3
- Composer

## Pacotes utilizados
- guzzlehttp

### Instalando dependências
Através de um terminal, abra o diretório do projeto api-ri e utilize o comando:
<br /> `composer install` <br /><br />
Serão instalados todos os módulos listados no diretório `vendor`.

## Executanto o projeto api-ri
Copie e cole o diretório api-ri para a pasta raiz do seu servidor  e.g `/var/www/html` 

## Acessando o serviço
A porta que o serviço estará executando será a porta padrão do apache : `80`.
Acesse o endereço a seguir através de alguma ferramenta do estilo [Postman](https://www.getpostman.com/) ou [Swagger Inspector](https://inspector.swagger.io/builder) :
<br /> `http://localhost:80/api-ri/filmes` <br />

Se tudo ocorrer perfeitamente, serão listados alguns filmes no formato JSON.
