<?php
    // verifica se já está logado para enviar para dashboard
    include_once 'helpers/redirect-dashboard.php';
    // verifica se já está logado para enviar para dashboard
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
    
    <!-- TELA DE RECUPERAÇÃO DE SENHA -->
    <?php include_once 'modulos-admin/recuperar/index.php'; ?>
    <!-- TELA DE RECUPERAÇÃO DE SENHA -->

    

    <!--BOOTSTRAP JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        
</body>
</html>