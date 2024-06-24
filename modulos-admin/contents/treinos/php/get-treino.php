<?php

require '../../../../config/bootstrap.php';
use Repositories\TreinoRepository;

$id = $_GET['id'];

$res = TreinoRepository::getTreino($id);

if($res) {
    echo json_encode($res);
} else {
    echo json_encode([]);
}