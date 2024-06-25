<?php
namespace Repositories;

use Models\Treino;

class TreinoRepository {
    
    // busca todos os treinos do usuário
    public static function getAllTreinos() {
        return Treino::with('categorias.posicoes.finalizacoes')->where('user_identificador', $_COOKIE['identificador'])->get();
    }

    //criar um novo treino para o usuário
    public static function createTreino($tipo_treino, $aula_treino, $dia_treino, $hora_treino, $data_treino, $observacoes, $nomesArquivos) {
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

    //deletar um treino
    public static function delete($id) {
        // buscando as imagens do treino
        $img_treino = Treino::where('treino_id', $id)->value('img_treino');

        // deletando as imagens do treino
        $res = Treino::where('treino_id', $id)->delete();

        // removendo as imagens do servidor
        if($img_treino) {
            foreach($img_treino as $img) {
                unlink(__DIR__ . '/../assets/imagens/site-admin/treinos/' . $img);
            }
        }

        // respondendo a requisição
        if($res) {
            return true;
        } else {
            return false;
        }
    }

    // buscar treino
    public static function getTreino($id) {
        $treino = Treino::where('treino_id', $id)->first();
        if($treino) {
            return $treino;
        } else {
            return false;
        }
    }


    // remover imagem do treino
    public static function deleteImgTreino($id, $imgName) {
        $img_treino = Treino::where('treino_id', $id)->value('img_treino');

        // Verifica se há apenas uma imagem no array
        if (count($img_treino) <= 1) {
            return false; 
        }

        // Encontra a chave da imagem a ser removida e a remove do array
        $key = array_search($imgName, $img_treino);
        if ($key !== false) {
            unset($img_treino[$key]);
        }

        $img_treino = array_values($img_treino);

        // Atualiza o registro diretamente com o novo valor de img_treino
        $res = Treino::where('treino_id', $id)->update(['img_treino' => $img_treino]);

        // removendo as imagem do servidor
        unlink(__DIR__ . '/../assets/imagens/site-admin/treinos/' . $imgName);

        if($res) {
            return $res;
        } else {
            return false;
        }
    }

    // buscar imagens do treino
    public static function getImagensTreino($id) {
        $img_treino = Treino::where('treino_id', $id)->value('img_treino');
        if($img_treino) {
            return $img_treino;
        } else {
            return false;
        }
    }

    // atualizar treino
    public static function updateTreino($id, $data) {
        $res = Treino::where('treino_id', $id)->update($data);

        if($res) {
            return true;
        } else {
            return false;
        }
    }


    // buscar imagens treino
    public static function getImgsTreino($id) {
        $res = Treino::where('treino_id', $id)->value('img_treino');
        if($res) {
            return $res;
        } else {
            return false;
        }
    }

}