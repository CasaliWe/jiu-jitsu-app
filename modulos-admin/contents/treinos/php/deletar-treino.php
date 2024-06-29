<?php

require '../../../../config/bootstrap.php';
use Repositories\TreinoRepository;

$id = $_POST['id_deletar'];

//deletando treino
$res = TreinoRepository::delete($id);

if($res){
    header('Location: ../../../../treinos.php?delete=true');
}else{
    header('Location: ../../../../treinos.php?error=true');
}
