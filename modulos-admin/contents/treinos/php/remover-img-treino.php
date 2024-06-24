<?php

require '../../../../config/bootstrap.php';
use Repositories\TreinoRepository;

$id = $_GET['id'];
$imgName = $_GET['imgName'];

//deletando img treino
$res = TreinoRepository::deleteImgTreino($id, $imgName);

if($res){
    echo json_encode(['status' => 'success', 'message' => 'Imagem deletada com sucesso!']);
}else{
    echo json_encode(['status' => 'error', 'message' => 'Erro ao deletar Imagem!']);
}
