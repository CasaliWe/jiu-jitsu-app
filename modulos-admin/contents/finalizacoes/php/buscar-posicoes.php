<?php

require '../../../../config/bootstrap.php';
use Repositories\TecnicaRepository;

$cat = $_GET['cat'];

//buscando posicoes da categoria
$res = TecnicaRepository::getPosicaoCategoria($cat);

if($res){
    echo json_encode(["success" => true ,"posicoes"=> $res]);
}else{
    echo json_encode(["success" => false, "message" => "Nenhuma posição encontrada para a categoria ".$cat]);
}