<?php

require '../../../../config/bootstrap.php';
use Repositories\TecnicaRepository;

// pegando os dados
$treino_id = $_POST['treino_id'];
$categoria_finalizacao = $_POST['categoria_finalizacao'];
$posicao_finalizacao = $_POST['posicao_finalizacao'];
$finalizacao = $_POST['finalizacao'];
$video = $_POST['video'];
$estrela = $_POST['estrela'];
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


// verificando link video e salvando na var
function extrairIdEPlataformaVideo($url) {
    $padroes = [
        'youtube' => '/(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/',
        'youtube_shorts' => '/(?:youtube\.com\/shorts\/)([a-zA-Z0-9_-]{11})/',
        'instagram' => '/(?:instagram\.com\/(?:p|reel|reels)\/)([a-zA-Z0-9_-]+)/',
    ];

    foreach ($padroes as $plataforma => $padrao) {
        if (preg_match($padrao, $url, $matches)) {
            // Retorna o ID e a plataforma se encontrado
            // Para 'youtube_shorts', ajusta a plataforma para 'youtube'
            $plataformaAjustada = $plataforma === 'youtube_shorts' ? 'youtube' : $plataforma;
            return ['id' => $matches[1], 'plataforma' => $plataformaAjustada];
        }
    }

    return false; // Retorna false se nenhum ID for encontrado
}

$resultado = extrairIdEPlataformaVideo($video);

if ($resultado !== false) {
    $videoId = $resultado['id'];
    $plataforma = $resultado['plataforma']; 
}

// salvando no banco
$res = TecnicaRepository::createFinalizacao($treino_id, $categoria_finalizacao, $posicao_finalizacao, $finalizacao, $passos, $obs, $videoId, $estrela, $plataforma);

if($res) {
    header('Location: ../../../../treinos.php?create=true');
} else {
    header('Location: ../../../../treinos.php?error=true');
}
