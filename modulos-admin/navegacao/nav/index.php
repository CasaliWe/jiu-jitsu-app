<?php
    // verificando qual página
    $urlAtual = $_SERVER['REQUEST_URI'];

    // titulos content páginas
    $tituloContentPagina = "";

    // link ativo página
    $activeDashboard = false;
    $activeTreinos = false;
    $activeFinalizacao = false;
    $activeObsTreino = false;
    $activeGaleria = false;
    $activeMetricas = false;
    $activeNoticias = false;
    $activeVideos = false;

    // Devolve o nome da página atual
    if(strpos($urlAtual, 'dashboard') !== false){
        $tituloContentPagina = "Dados do perfil";
        $activeDashboard = true;
    }else if(strpos($urlAtual, 'treinos') !== false){
        $tituloContentPagina = "Todos os treinos";
        $activeTreinos = true;
    }else if(strpos($urlAtual, 'finalizacoes') !== false){
        $tituloContentPagina = "Todas as Finalizações";
        $activeFinalizacao = true;
    }else if(strpos($urlAtual, 'observacoes') !== false){
        $tituloContentPagina = "Todas as Observações dos treinos";
        $activeObsTreino = true;
    }else if(strpos($urlAtual, 'galeria') !== false){
        $tituloContentPagina = "Todas as Imagens dos treinos";
        $activeGaleria = true;
    }else if(strpos($urlAtual, 'metricas') !== false){
        $tituloContentPagina = "Tudo sobre suas métricas";
        $activeMetricas = true;
    }else if(strpos($urlAtual, 'noticias') !== false){
        $tituloContentPagina = "Notícias sobre o mundo dos esportes";
        $activeNoticias = true;
    }else if(strpos($urlAtual, 'videos') !== false){
        $tituloContentPagina = "Vídeos sobre o mundo dos esportes";
        $activeVideos = true;
    }
?>




<nav class="d-flex flex-column w-100">
    <a href="dashboard.php" class="link-nav-desktop <?= $activeDashboard ? 'active-link-desktop' : ''; ?>">Dados</a>
    <a href="treinos.php" class="link-nav-desktop <?= $activeTreinos ? 'active-link-desktop' : ''; ?>">Treinos</a>
    <a href="finalizacoes.php" class="link-nav-desktop <?= $activeFinalizacao ? 'active-link-desktop' : ''; ?>">Finalizações</a>
    <a href="observacoes.php" class="link-nav-desktop <?= $activeObsTreino ? 'active-link-desktop' : ''; ?>">Observações treinos</a>
    <a href="galeria.php" class="link-nav-desktop <?= $activeGaleria ? 'active-link-desktop' : ''; ?>">Galeria</a>
    <a href="metricas.php" class="link-nav-desktop <?= $activeMetricas ? 'active-link-desktop' : ''; ?>">Métricas</a>
    <a href="videos.php" class="link-nav-desktop <?= $activeVideos ? 'active-link-desktop' : ''; ?>">Vídeos esportes</a>
    <a href="noticias.php" class="link-nav-desktop <?= $activeNoticias ? 'active-link-desktop' : ''; ?>">Notícias esportes</a>
    <a class="link-nav-desktop"><?php include "modulos-admin/btn-logout/index.php"; ?></a>
</nav>