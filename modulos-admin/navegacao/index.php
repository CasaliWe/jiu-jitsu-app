<?php 
    include_once "config/config.php";

    $img = $user->foto;
    $nome = $user->nome;
    $faixa = $user->faixa;
?>


<link rel="stylesheet" href="<?php echo $base_url ?>modulos-admin/navegacao/css/style.css">


<!-- MOBILE -->
<div id="content-navegacao-mobile" class="px-5">
    <button id="btn-close" onclick="abrirNavMobile()"> <i class="fas fa-close fs-1 text-danger"></i> </button>

    <!-- NAVEGAÇÃO -->
    <?php include "modulos-admin/navegacao/nav/index.php";?>
    <!-- NAVEGAÇÃO -->
</div>

<section id="header-navegacao-mobile" class="shadow-lg bg-logo-nav">
        <div class="d-flex align-items-center">
            <div class="me-3 align-self-center " id="container-logo-rounded">
                <img src="<?php echo $base_url ?>assets/imagens/site-admin/ids/<?= $img ? $img : 'img-id.jpg' ?>" alt="Logo">
            </div>
            <p class="align-self-center mt-3 nome-faixa-mobile"><?= $nome; ?> <br> <?= $faixa ? strtoupper($faixa) : "" ?></p>
        </div>

    <button onclick="abrirNavMobile()" style="background-color: transparent; border: none; cursor: pointer;"> <i class="fas btn-toggler-mobile fa-bars color-toggler"></i> </button>
</section>
<!-- MOBILE -->



<!-- DESKTOP -->
<aside id="navegacao-desktop" class="position-fixed left-0 vh-100 d-flex flex-column bg-secondary bg-opacity-25 shadow-lg">
    <div class="bg-logo-nav py-4 w-100 px-3 d-flex flex-column justify-content-center align-items-center">
        <div id="container-logo-rounded">
            <img src="<?php echo $base_url ?>assets/imagens/site-admin/ids/<?= $img ? $img : 'img-id.jpg' ?>" alt="Logo">
        </div>
        <p class="mt-3 small"><?= $nome; ?> <?= $faixa ? strtoupper('- '. $faixa) : "" ?></p>
    </div>

    <!-- NAVEGAÇÃO -->
    <?php include "modulos-admin/navegacao/nav/index.php";?>
    <!-- NAVEGAÇÃO -->
</aside>
<!-- DESKTOP -->


<script src="<?php echo $base_url ?>modulos-admin/navegacao/js/app.js"></script>