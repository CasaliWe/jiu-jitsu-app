<?php

require '../../../../config/bootstrap.php';
use Repositories\TecnicaRepository;

// pegando o tipo da categoria
$categoria = $_GET['categoria'];

$res = TecnicaRepository::findByCategoria($categoria);

if($res) {
    echo json_encode($res);
} else {
    echo json_encode([]);
}