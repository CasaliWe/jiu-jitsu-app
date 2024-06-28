<?php

require '../../../../config/bootstrap.php';
use Repositories\TecnicaRepository;

$id = $_POST['finalizacao_id_editar'];
$finalizacao = $_POST['finalizacao_editar'];
$video = $_POST['video_editar'];
$estrela = $_POST['estrela_editar'];

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

// verificando link video
$videoId = null;
$plataformaVideo = null;
if (filter_var($video, FILTER_VALIDATE_URL) !== false) {
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
        $plataformaVideo = $resultado['plataforma']; 
    }
}


// verificando se foi alterado o vídeo para salvar no banco
if($videoId){
    $finalizacao = TecnicaRepository::updateFinalizacao($id,[
        'nome' => $finalizacao,
        'passo_a_passo' => $passos,
        'observacoes' => $observacoes,
        'video' => $videoId,
        'estrela' => $estrela,
        'plataforma' => $plataformaVideo,
    ]);
}else{
    $finalizacao = TecnicaRepository::updateFinalizacao($id,[
        'nome' => $finalizacao,
        'passo_a_passo' => $passos,
        'observacoes' => $observacoes,
        'estrela' => $estrela,
    ]);
}

if($finalizacao) {
    header('Location: ../../../../treinos.php?success=true');
} else {
    header('Location: ../../../../treinos.php?error=true');
}

