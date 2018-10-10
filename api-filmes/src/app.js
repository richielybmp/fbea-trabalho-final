const express = require('express')
//biblioteca que auxilia na conversão do corpo das requisições para padrão ideal para js



const app = express();

/****** BANCO ******/

const mongoose = require('mongoose')
const dbName = 'db_apiFilmes'
const bodyParser = require('body-parser')

mongoose.connect('mongodb://localhost/'+ dbName, { useNewUrlParser: true })

const db = mongoose.connection;

db.on('error', console.error.bind(console, 'connection error:'));
db.once('open', function() {
    console.log(`Conectado no banco de dados ${dbName}`);
});


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
app.use('/filmes', filmesRoute);


module.exports = app;


