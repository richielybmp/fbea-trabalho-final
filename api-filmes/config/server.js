const porta = process.env.PORT || 3000;

const bodyParser = require('body-parser')
const queryParser = require('express-query-int')
const express = require('express')
const server = express()

server.use(bodyParser.urlencoded({ extended: true }))
server.use(bodyParser.json())
server.use(queryParser())

server.get('/', function(req, res) {
    res.send('Api Filmes');
});

server.listen(porta, function(){
    console.log(`Api-Filmes executando na porta ${porta}!`)
})

module.exports = server