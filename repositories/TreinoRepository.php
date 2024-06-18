<?php
namespace Repositories;

require __DIR__ .'/../models/Treino.php';
use Models\Treino;

class TreinoRepository {
    
    public function getAllTreinos() {
        // busca todos os usuários
        return Treino::all();
    }

}