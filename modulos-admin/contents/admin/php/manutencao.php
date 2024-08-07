<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Accept, X-Requested-With, Cache-Control, Authorization, Origin');

require '../../../../config/bootstrap.php';
use Repositories\adminRepository;

$status = $_GET['status'];

if($status == 'ativo'){
    $res = adminRepository::manutencao('ativo');
    if($res){
        echo true;
        exit;
    }else{
        echo false;
        exit;
    }
}else if($status == 'inativo'){
    $res = adminRepository::manutencao('inativo');
    if($res){
        echo true;
        exit;
    }else{
        echo false;
        exit;
    }
}else{
    echo false;
    exit;
}