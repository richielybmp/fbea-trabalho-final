var Filme = require('../src/models/filme');

module.exports = class FilmeService {
    
    static addFilme(filmeObj, callback){
        Filme.create(filmeObj, callback);
    }

    static obtenhaFilmes(callback){
        Filme.find({}, callback);
    }

    static obtenhaFilme(id, callback){
        Filme.findById(id, callback)
    }

    static atualizeFilme(id, callback){
        Filme.findOneAndUpdate(id, callback)
    }

    static removaFilme(id, callback){
        Filme.deleteOne(id, callback)
    }
}