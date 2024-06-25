<?php

require '../../../../config/bootstrap.php';
use Repositories\TecnicaRepository;

$id = $_POST['finalizacao_id_editar'];
$finalizacao = $_POST['finalizacao_editar'];

$pass = $_POST['passo_a_passo_editar'];
$passos = explode(";", $pass);

$obs = $_POST['obs_finalizacao_editar'];
$observacoes = explode(";", $obs); 

// Adiciona ';' no final de cada item, se necessário
$passos = array_map(function($passo) {
    return rtrim($passo) . ';';
}, $passos);

$observacoes = array_map(function($ob) {
    return rtrim($ob) . ';';
}, $observacoes);

$finalizacao = TecnicaRepository::updateFinalizacao($id,[
    'nome' => $finalizacao,
    'passo_a_passo' => $passos,
    'observacoes' => $observacoes,
]);

if($finalizacao) {
    header('Location: ../../../../treinos.php?success=true');
} else {
    header('Location: ../../../../treinos.php?error=true');
}

