'use strict';
// FilmeController.js
const express = require('express');
const router = express.Router();
const controller = require('../controllers/filme-controller');

// GET - Lista todos os filmes existentes no banco de dados.
router.get('/', controller.getAll);

// GET - Lista todos os filmes existentes no banco de dados.
router.get('/:id', controller.find);

// POST - Criar novo registro filme no banco de dados
router.post('/', controller.create);

router.delete('/:id', controller.delete);


module.exports = router;