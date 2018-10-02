const mongoose = require('../restful/restful-model')
const ReviewSchema = require('./review')
var Schema = mongoose.model.Schema;

const filmeSchema = new Schema
({
    // _id:
    //     {
    //         type: Schema.Types.ObjectId, 
    //         required: [true,'Filme não encontrado'],
    //     },
    titulo:
        {
            type: String,
            required: true
        },
    diretor:
        {
            type: String, 
            required: true
        },
    genero:
        {
            type: String, 
            required: true
        },
    ano:
        {
            type: Date,
            required: true
        },
     reviews:
            [ReviewSchema]
})

module.exports.Review = mongoose.restful.model('Review', ReviewSchema)
module.exports.Filme = mongoose.restful.model('Filme', filmeSchema)