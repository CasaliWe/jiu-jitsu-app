<?php
    // verifica auth
    include_once 'helpers/verifica-auth.php';

    // verifica manutencao
    include_once 'helpers/verifica-manutencao.php';

    // busca as obersevações gerais    
    use Repositories\ObservacoesGeraisRepository;
    $observacoesGerais = ObservacoesGeraisRepository::getObservacoesGerais();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>

    <!-- HEADER -->
    <?php include_once 'modulos-admin/header/index.php'; ?>
    <!-- HEADER -->

</head>
<body>

    <!-- LOADING -->
    <?php include_once 'modulos-admin/loading/index.php'; ?>
    <!-- LOADING -->

    <!-- NAVEGAÇÃO -->
    <?php include_once 'modulos-admin/navegacao/index.php'; ?>
    <!-- NAVEGAÇÃO -->


    <!-- CONTENT -->
    <main id="content-pagina">
        <h5 id="titulo-content-pagina" class="fw-semibold"><?php echo $tituloContentPagina ?></h5>

        <!-- módulo content página -->
        <?php include_once 'modulos-admin/contents/observacoes-gerais/index.php';?>
        <!-- módulo content página -->
    </main>
    <!-- CONTENT -->

    
    <!-- MODAL AVISOS -->
     <?php include_once "modulos-admin/modal-aviso/index.php"; ?>
    <!-- MODAL AVISOS -->

    <!-- MODAL ADD -->
    <?php include_once "modulos-admin/contents/observacoes-gerais/modais/add-obs.php"; ?>
    <!-- MODAL ADD -->

    <!-- MODAL EDIT -->
    <?php include_once "modulos-admin/contents/observacoes-gerais/modais/edit-obs.php"; ?>
    <!-- MODAL EDIT -->

    <!-- MODAL DELETE -->
    <?php include_once "modulos-admin/contents/observacoes-gerais/modais/delete-obs.php"; ?>
    <!-- MODAL DELETE -->

    <!-- MODAL PERFIL -->
    <?php include_once "modulos-admin/modal-perfil/index.php"; ?>
    <!-- MODAL PERFIL -->



    <!--BOOTSTRAP JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        
</body>
</html>