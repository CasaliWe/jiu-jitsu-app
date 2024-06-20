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
$passos = explode("\n", $passo_a_passo);
$obs = explode("\n", $obs_finalizacao);

$passos_array = [];
foreach ($passos as $passo) {
    $passos_array[] = trim($passo);
}

$obs_array = [];
foreach ($obs as $ob) {
    $obs_array[] = trim($ob, "*;\r");
}

$passo_a_passo_json = json_encode($passos_array);
$obs_finalizacao_json = json_encode($obs_array);

// salvando no banco
$res = TecnicaRepository::createFinalizacao($treino_id, $categoria_finalizacao, $posicao_finalizacao, $finalizacao, $passo_a_passo_json, $obs_finalizacao_json);

if($res) {
    header('Location: ../../../../treinos.php?success=true');
} else {
    header('Location: ../../../../treinos.php?error=true');
}
