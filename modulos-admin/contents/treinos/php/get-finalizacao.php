<?php

require '../../../../config/bootstrap.php';
use Repositories\TecnicaRepository;

$id = $_GET['id'];

$res = TecnicaRepository::getFinalizacao($id);

if($res) {
    echo json_encode($res);
} else {
    echo json_encode([]);
}