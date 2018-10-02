const mongoose = require('../restful/restful-model')
var Schema = mongoose.model.Schema;

const reviewSchema = new Schema
({
    idFilme: 
        {
            type: String,
            default: true
        },
    usuario:
        {
            type: String,
            required: true
        },
    review:
        {
            type: String,
            required: true
        },
    data:
        {
            type: Date,
            required: true
        }
});

module.exports = reviewSchema;