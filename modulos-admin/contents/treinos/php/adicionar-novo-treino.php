<?php

require '../../../../config/bootstrap.php';
use Repositories\TreinoRepository;

// pegando os dados do formulário
$tipo_treino = $_POST['tipo_treino'];
$aula_treino = $_POST['aula_treino'];
$dia_treino = $_POST['dia_treino'];
$hora_treino = $_POST['hora_treino'];
$data_treino = $_POST['data_treino'];

// pegando as observações do treino e transformando em um array
$observacoes = $_POST['observacoes_treino']; 
$observacoes = explode(";\n* ", $observacoes); 
$observacoes_json = json_encode($observacoes); 

// pegando as imagens do treino
$nomesArquivos = [];

if (isset($_FILES['img_treino'])) {
    $pastaDestino = "../../../../assets/imagens/site-admin/treinos/";
    $dataHora = date('YmdHis');

    foreach ($_FILES['img_treino']['name'] as $key => $nomeArquivo) {
        if ($_FILES['img_treino']['error'][$key] == UPLOAD_ERR_OK) {
            $nomeArquivo = $dataHora . $nomeArquivo;
            $caminhoDestino = $pastaDestino . $nomeArquivo;

            move_uploaded_file($_FILES['img_treino']['tmp_name'][$key], $caminhoDestino);

            $nomesArquivos[] = $nomeArquivo;
        }
    }
}

$nomesArquivos_json = json_encode($nomesArquivos); 


// criando o treino
$treino = TreinoRepository::createTreino($tipo_treino, $aula_treino, $dia_treino, $hora_treino, $data_treino, $observacoes_json, $nomesArquivos_json);
if($treino) {
    header('Location: ../../../../treinos.php?success=true');
} else {
    header('Location: ../../../../treinos.php?error=true');
}