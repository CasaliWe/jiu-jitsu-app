<?php
namespace Repositories;

use Models\Categoria;
use Models\Posicao;
use Models\Finalizacao;

class TecnicaRepository {

    // Cria toda a tecnica com Categoria, Posicao e Finalizacao
    public static function createFinalizacao($treino_id, $categoria_finalizacao, $posicao_finalizacao, $finalizacao, $passo_a_passo_json, $obs_finalizacao_json) {
        $categoria = Categoria::firstOrCreate([
            'nome' => $categoria_finalizacao,
            'user_identificador' => $_COOKIE['identificador'],
            'treino_id' => $treino_id
        ]);
        
        $posicao = Posicao::firstOrCreate([
            'nome' => $posicao_finalizacao,
            'categoria_id' => $categoria->id
        ]);

        $finalizacao = Finalizacao::create([
            'nome' => $finalizacao,
            'passo_a_passo' => $passo_a_passo_json,
            'observacoes' => $obs_finalizacao_json,
            'posicao_id' => $posicao->id
        ]);

        if($finalizacao) {
            return true;
        } else {
            return false;
        }
    }

    // Deleta a finalizacao
    public static function deleteFinalizacao($id) {
        $finalizacao = Finalizacao::find($id);
        if($finalizacao) {
            $finalizacao->delete();
            return true;
        } else {
            return false;
        }
    }

    // Busca todas as posições por categoria
    public static function findByCategoria($categoria) {
        $categorias = Categoria::where('user_identificador', $_COOKIE['identificador'])->get();
        $posicoes = [];
        foreach($categorias as $cat) {
            if($cat->nome === $categoria) {
                $posicoes = Posicao::where('categoria_id', $cat->id)->get();
            }
        }
        if($posicoes) {
            return $posicoes;
        } else {
            return false;
        }
    }

}