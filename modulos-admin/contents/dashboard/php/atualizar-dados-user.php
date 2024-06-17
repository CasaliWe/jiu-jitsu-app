<?php

// require
require '../../../../config/bootstrap.php';
require '../../../../repositories/UserRepository.php';
use Repositories\UserRepository;
$userRepository = new UserRepository();

// Get user data
$identificador = $_POST['identificador'];
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$email = $_POST['email'];
$faixa = $_POST['faixa'];

// Update user data
$res = $userRepository->updateUserData($identificador, $nome, $sobrenome, $email, $faixa);
if($res){
    header('Location: ../../../../dashboard.php?success=true');
}else{
    header('Location: ../../../../dashboard.php?error=true');
}