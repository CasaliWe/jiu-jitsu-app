<?php
    // verificando qual página
    $urlAtual = $_SERVER['REQUEST_URI'];

    // titulos content páginas
    $tituloContentPagina = "";

    // link ativo página
    $activeDashboard = false;
    $activeTreinos = false;

    // Devolve o nome da página atual
    if(strpos($urlAtual, 'dashboard') !== false){
        $tituloContentPagina = "Dados do perfil";
        $activeDashboard = true;
    }else if(strpos($urlAtual, 'treinos') !== false){
        $tituloContentPagina = "Todos os treinos";
        $activeTreinos = true;
    }
?>




<nav class="d-flex flex-column w-100">
    <a href="dashboard.php" class="link-nav-desktop <?= $activeDashboard ? 'active-link-desktop' : ''; ?>">Dados</a>
    <a href="treinos.php" class="link-nav-desktop <?= $activeTreinos ? 'active-link-desktop' : ''; ?>">Treinos</a>
    <a class="link-nav-desktop"><?php include "modulos-admin/btn-logout/index.php"; ?></a>
</nav>