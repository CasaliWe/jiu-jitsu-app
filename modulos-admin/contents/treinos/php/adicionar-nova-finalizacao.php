<?php

require '../../../../config/bootstrap.php';
use Repositories\TecnicaRepository;

// pegando os dados
$treino_id = $_POST['treino_id'];
$categoria_finalizacao = $_POST['categoria_finalizacao'];
$posicao_finalizacao = $_POST['posicao_finalizacao'];
$finalizacao = $_POST['finalizacao'];
$passo_a_passo = $_POST['passo-a-passo'];
$obs_finalizacao = $_POST['obs_finalizacao'];

// transformando passo a passo a passo e observações em json para salvar no banco
$passos = explode(";", $passo_a_passo);
$obs = explode(";", $obs_finalizacao);

// Adiciona ';' no final de cada item, se necessário
$passos = array_map(function($passo) {
    return rtrim($passo) . ';';
}, $passos);

$obs = array_map(function($ob) {
    return rtrim($ob) . ';';
}, $obs);

// salvando no banco
$res = TecnicaRepository::createFinalizacao($treino_id, $categoria_finalizacao, $posicao_finalizacao, $finalizacao, $passos, $obs);

if($res) {
    header('Location: ../../../../treinos.php?create=true');
} else {
    header('Location: ../../../../treinos.php?error=true');
}
