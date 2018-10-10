const express = require('express')
//biblioteca que auxilia na conversão do corpo das requisições para padrão ideal para js

const app = express();
const bodyParser = require('body-parser')

/**************** BANCO ********************/
require('../config/database')

/**************** CARREGAR MODELS *****************/
const filme = require('./models/filme');

/**************** CARREGAR ROTAS *****************/
const indexRoute = require('./routes/index-route')
const filmesRoute = require('./routes/filme-router')

/**************** Prepara todas as requisições com o body parser *****************/
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: false }));

//configura as rotas default
app.use('/api', indexRoute);
app.use('/api/filmes', filmesRoute);


module.exports = app;


