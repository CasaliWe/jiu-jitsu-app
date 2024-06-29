<?php

require '../../../../config/bootstrap.php';
use Repositories\TecnicaRepository;

$id = $_POST['id_deletar'];

//deletando treino
$res = TecnicaRepository::deleteFinalizacao($id);

if($res){
    header('Location: ../../../../treinos.php?delete=true');
}else{
    header('Location: ../../../../treinos.php?error=true');
}
