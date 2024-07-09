<?php

session_start();

require '../../../config/bootstrap.php';
use Repositories\UserRepository;

$email = $_POST['email'];

$res = UserRepository::findByEmail($email);

if($res && $res->email == $email){
    enviarEmailRecuperarSenha($res->email);
}else{
    $_SESSION['erro-email-recuperar'] = true;
    header("Location: ../../../recuperar-senha.php");
    exit;
}


// enviar email
function enviarEmailRecuperarSenha($email){

    // enviar o email com o link para recuperar a senha
    
    
    // leva para a mesma página e mostra mensagem de sucesso
    $_SESSION['success-email-recuperar'] = true;
    header("Location: ../../../recuperar-senha.php");
    exit;
    
}





