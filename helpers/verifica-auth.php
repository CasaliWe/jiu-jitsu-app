<?php

    session_start();

    require __DIR__.'/../config/bootstrap.php';
    require __DIR__.'/../repositories/UserRepository.php';
    use Repositories\UserRepository;
    $userRepository = new UserRepository();

    // verificação auth
    if(isset($_COOKIE['token'])){
        $token = $_COOKIE['token'];
        $user = $userRepository->getUser($_COOKIE['identificador']);
        if($user->token != $token){
            setcookie("token", "", time() - 3600, "/");
            setcookie("identificador", "", time() - 3600, "/");
            header("Location: index.php");
            exit;
        }
    }else{
        header("Location: index.php");
        exit;
    }

?>