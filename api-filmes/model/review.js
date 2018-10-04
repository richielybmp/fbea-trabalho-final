const mongoose = require('mongoose');  

const ReviewSchema = new mongoose.Schema({  
    idFilme: String,
    usuario: String,
    comentario: String,
    data: Date
});

module.exports = ReviewSchema;

// mongoose.model('Review', ReviewSchema);
// module.exports = mongoose.model('Review');