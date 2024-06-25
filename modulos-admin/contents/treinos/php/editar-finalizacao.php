<?php

require '../../../../config/bootstrap.php';
use Repositories\TecnicaRepository;

$id = $_POST['finalizacao_id_editar'];
$finalizacao = $_POST['finalizacao_editar'];

$pass = $_POST['passo_a_passo_editar'];
$passos = explode(";", $pass);
// Adiciona ';' em cada item, exceto no último
for($i = 0; $i < count($passos) - 1; $i++) {
    $passos[$i] = trim($passos[$i]) . ';';
}
$passos = array_values($passos);

$obs = $_POST['obs_finalizacao_editar'];
$observacoes = explode(";", $obs);
// Adiciona ';' em cada item, exceto no último
for($i = 0; $i < count($observacoes) - 1; $i++) {
    $observacoes[$i] = trim($observacoes[$i]) . ';';
}
$observacoes = array_values($observacoes);


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

