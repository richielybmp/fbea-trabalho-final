const FilmeSchema = require('../model/filme')

FilmeSchema.Filme.methods(['get', 'post', 'put', 'delete'])
FilmeSchema.Filme.updateOptions({ new: true, runValidators: true })

module.exports = FilmeSchema.Filme