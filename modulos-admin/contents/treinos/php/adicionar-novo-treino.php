<?php

$tipo_treino = $_POST['tipo_treino'];
$aula_treino = $_POST['aula_treino'];
$dia_treino = $_POST['dia_treino'];
$hora_treino = $_POST['hora_treino'];
$data_treino = $_POST['data_treino'];

$observacoes_treino = $_POST['observacoes_treino'];
$observacoes_array = explode(';', $observacoes_treino);
$observacoes_json = json_encode($observacoes_array);


if (isset($_FILES['img_treino']) && $_FILES['img_treino']['error'] != UPLOAD_ERR_NO_FILE) {
    $pastaDestino = "treinos-img/";
    $dataHora = date('YmdHis');
    $nomeArquivo = $dataHora . basename($_FILES['img_treino']['name']);
    $caminhoDestino = $pastaDestino . $nomeArquivo;

    move_uploaded_file($_FILES['img_treino']['tmp_name'], $caminhoDestino);

    // salvar no banco
    
}