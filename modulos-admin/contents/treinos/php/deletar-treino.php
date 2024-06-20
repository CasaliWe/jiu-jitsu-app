<?php

require '../../../../config/bootstrap.php';
use Repositories\TreinoRepository;

$id = $_GET['id'];

//deletando treino
$res = TreinoRepository::delete($id);

if($res){
    echo json_encode(['status' => 'success', 'message' => 'Treino deletado com sucesso!']);
}else{
    echo json_encode(['status' => 'error', 'message' => 'Erro ao deletar treino!']);
}
