<?php
namespace Repositories;

require __DIR__ .'/../models/Treino.php';
use Models\Treino;

class TreinoRepository {
    
    // busca todos os treinos do usuário
    public function getAllTreinos() {
        return Treino::with('categorias.posicoes.finalizacoes')->where('user_identificador', $_COOKIE['identificador'])->get();
    }

    //criar um novo treino
    public function createTreino($tipo_treino, $aula_treino, $dia_treino, $hora_treino, $data_treino, $observacoes, $nomesArquivos) {
        $treino = Treino::create([
            'tipo_treino' => $tipo_treino,
            'aula_treino' => $aula_treino,
            'dia_treino' => $dia_treino,
            'hora_treino' => $hora_treino,
            'data_treino' => $data_treino,
            'img_treino' => $nomesArquivos,
            'observacoes_treino' => $observacoes,
            'user_identificador' => $_COOKIE['identificador']
        ]);

        if($treino) {
            return true;
        } else {
            return false;
        }
    }

}