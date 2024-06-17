<?php

session_start();

require __DIR__.'/../config/bootstrap.php';
require __DIR__.'/../repositories/UserRepository.php';
use Repositories\UserRepository;
$userRepository = new UserRepository();

if(isset($_COOKIE['token'])){
    $user = $userRepository->getUser($_COOKIE['identificador']);
    if($user->token == $_COOKIE['token']){
        header("Location: dashboard.php");
        exit;
    }else{
        setcookie("identificador", "", time() - 3600, "/");
        setcookie("token", "", time() - 3600, "/");
        exit;
    }
}