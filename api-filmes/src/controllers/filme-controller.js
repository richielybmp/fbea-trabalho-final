// FilmeController.js

var FilmeService = require('../../services/filmeService')

// GET - Lista todos os filmes existentes no banco de dados.
exports.getAll = (req, res, next) => {
    FilmeService.obtenhaFilmes((erro, filmes) => {
        if (erro)
            return res.status(500).send("Ocorreu um problema ao tentar localizar um filme." + erro);
         res.status(200).send(filmes);
    });
};

// GET - Lista todos os filmes existentes no banco de dados.
exports.find = (req, res, next) => {
    const id = req.params.id;
    FilmeService.obtenhaFilme(id, (erro, filme) => {
        if (erro)
            return res.status(404).send("Ocorreu um problema ao tentar localizar um filme." + erro);
        res.status(200).send(filme);
    });
};

// POST - Criar novo registro filme no banco de dados
exports.create = (req, res, next) => {
    const filmeObj =
        {
            titulo: req.body.titulo,
            diretor: req.body.diretor,
            genero: req.body.genero,
            ano: req.body.ano
            //reviews - inicialmente o filme ao ser criado não possui nenhum comentário
        };

    FilmeService.addFilme(filmeObj, (erro, filme) =>{
        if (erro)
            return res.status(500).send("Ocorreu um erro ao tentar adicionar o Filme no banco de dados." + erro);
        res.status(200).send(`${filme.titulo} adicionado com sucesso!`);
    });
};

exports.update = (req, res, next) =>{
    const id = req.params.id;
    FilmeService.atualizeFilme(id, req.body, (erro) =>{
        if (erro)
            return res.status(500).send("Ocorreu um erro ao tentar atualizar o Filme do banco de dados." + erro);
        res.status(200).send("Filme atualizado com sucesso!");
    });
};

exports.delete = (req, res, next) =>{
    const id = req.params.id;
    FilmeService.removaFilme(id, (erro) =>{
        if (erro)
            return res.status(500).send("Ocorreu um erro ao tentar remover o Filme do banco de dados." + erro);
        res.status(200).send("Filme removido com sucesso!");
    });
};

exports.inserirReview = (req, res, next) => {
    const id = req.params.id;
    const review = req.body.review;
    const user = req.body.user;

    FilmeService.addReview(id, review, user, (erro) =>{
        if(erro)
            return res.status(500).send("Ocorreu um erro ao tentar adicionar um review no filme de id " + id + ". Erro:\n " + erro);
        res.status(200).send("Review adicionado com sucesso!");
    });
};