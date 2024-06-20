<?php

// require
require '../../../../config/bootstrap.php';
use Repositories\UserRepository;

// Get user data
$identificador = $_POST['identificador'];
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$email = $_POST['email'];
$faixa = $_POST['faixa'];

// Update user data
$res = UserRepository::updateUserData($identificador, $nome, $sobrenome, $email, $faixa);
if($res){
    header('Location: ../../../../dashboard.php?success=true');
}else{
    header('Location: ../../../../dashboard.php?error=true');
}