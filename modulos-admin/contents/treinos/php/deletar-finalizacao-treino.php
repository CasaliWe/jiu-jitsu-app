<?php

require '../../../../config/bootstrap.php';
use Repositories\TecnicaRepository;

$id = $_GET['id'];

//deletando treino
$res = TecnicaRepository::deleteFinalizacao($id);

if($res){
    echo json_encode(['status' => 'success', 'message' => 'Finalização deletada com sucesso!']);
}else{
    echo json_encode(['status' => 'error', 'message' => 'Erro ao deletar Finalização!']);
}
