<?php
    include_once 'config/config.php';
?>

<link rel="stylesheet" href="<?php echo $base_url ?>modulos-admin/contents/treinos/css/style.css">

<!-- TREINOS -->
<section>
    <h6 class="small mb-4">Aqui você pode <strong>Adicionar</strong> todos os seus treinos!</h6>

    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modal-treino">Adicionar novo treino +</button>

    <!-- dias -->
    <?php foreach ($treinos as $key => $treino) { ?>
        
        <?php
            // montando a data
            setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
            $data_completa = strftime('%d de %B de %Y', strtotime($treino['data_treino'])); 
            $data_reduzida = date('d-m-Y', strtotime($treino['data_treino']));

            // pegando o nome das imagens do json
            $imgs_treino = json_decode($treino['img_treino'], true);

            // pegando as observações do treino
            $obsJson = json_decode($treino['observacoes_treino'], true);
            $observacoes = explode(';', $obsJson[0]);
        ?>

        <div class="my-4 item-acordion accordion">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#treino-<?php echo $key ?>" aria-expanded="false" aria-controls="treino-<?php echo $key ?>">
                        <div class="d-flex align-items-center justify-content-between w-100 px-2">
                            <div class="d-flex flex-column text-start">
                                <span class="mb-1 small fw-semibold"><?= $treino['tipo_treino']; ?></span>
                                <span class="small"> <span class="text-primary fw-semibold"><?= $treino['aula_treino']; ?></span> aula </span>
                            </div>

                            <div class="d-flex flex-column text-center">
                                <span class="mb-1 small d-none d-lg-block"><?= $treino['dia_treino']; ?> - <?= $treino['hora_treino']; ?> hrs</span>
                                <span class="small d-none d-lg-block"><?= $data_completa; ?></span>

                                <span class="mb-1 small d-block d-lg-none"><?= substr($treino['dia_treino'], 0, 3); ?> - <?= $treino['hora_treino']; ?> hrs</span>
                                <span class="small d-block d-lg-none"><?= $data_reduzida; ?></span>
                            </div>

                            <div class="dropdown ps-2 pe-0 ps-lg-3 pe-lg-1" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item">Editar</a></li>
                                    <li><a class="dropdown-item" onclick="deletarTreino('<?= $treino['treino_id'] ?>')">Deletar</a></li>
                                </ul>
                            </div>
                        </div>
                    </button>
                </h2>
                <div id="treino-<?php echo $key ?>" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
        
                        <div class="row my-3">
                            <div class="mb-4 col-12 col-lg-6 col-xxl-5">
                                <div class="container-img-treino"> <img src="<?= $base_url; ?>assets/imagens/site-admin/treinos/<?= $imgs_treino[0] ?>"> </div>
                            </div>

                            <div class="mb-4 col-12 col-lg-6 col-xxl-3 px-3">
                                <h6 class="fw-semibold mb-3">Observações gerais:</h6>

                                <div class="small">
                                    <?php foreach ($observacoes as $obs) { ?>
                                        <p class="mb-1"><?= $obs; ?></p>
                                    <?php } ?>
                                </div>
                            </div>

                            <!-- container finalizações -->
                            <div class="_container-finalizacao-treino pt-4 pt-xxl-0 col-12 col-lg-12 col-xxl-4 px-3 px-xxl-4">
                                
                                <div class="mb-3 d-flex flex-column flex-lg-row justify-content-between align-items-start align-items-lg-center">
                                    <button type="button" onclick="adicionarIdModalAddFinalizacao('<?= $treino['treino_id']; ?>')" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalAddFinalizacao">Adicionar finalizações +</button>
                                </div>

                                <!-- finalizações -->
                                <?php 
                                    $posicoes = [];
                                    $finalizacaoes = [];

                                    if (isset($treino['categorias'])) {
                                        foreach ($treino['categorias'] as $categoria) {
                                            if (isset($categoria['posicoes'])) {
                                                foreach ($categoria['posicoes'] as $posicao) {
                                                    $posicoes[] = $posicao;
                                                }
                                            }
                                        }
                                    }
                                
                                    foreach ($posicoes as $posicao) {
                                        if (isset($posicao->finalizacoes)) {
                                            foreach ($posicao->finalizacoes as $finalizacao) { ?>
                                                <?php $finalizacaoes[] = $finalizacao; ?>

                                                <div class="mb-3 item-acordion accordion">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header d-flex px-2 align-items-center justify-content-between">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#finalizacao-<?php echo $finalizacao['id'] ?>" aria-expanded="false" aria-controls="finalizacao-<?php echo $finalizacao['id'] ?>">
                                                                <?= $finalizacao['nome']; ?>
                                                            </button>

                                                            <div style="cursor: pointer;" class="dropdown ps-3 pe-1 ps-lg-3 pe-lg-3 d-flex justify-content-center" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="fas fa-ellipsis-v fs-5"></i>
                                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                    <li><a class="dropdown-item">Editar</a></li>
                                                                    <li><a class="dropdown-item" onclick="deletarFinalizacao('<?= $finalizacao['id'] ?>')">Deletar</a></li>
                                                                </ul>
                                                            </div>
                                                        </h2>
                                                        <div id="finalizacao-<?php echo $finalizacao['id'] ?>" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                                            <div class="accordion-body">
                                                
                                                                <div class="d-flex flex-column mb-3">
                                                                    <h6 class="mb-2">Passo a passo:</h6>

                                                                    <?php 
                                                                       $passos = json_decode($finalizacao['passo_a_passo'], true);

                                                                       foreach ($passos as $passo) { ?>
                                                                            <span class="mb-1"><?= $passo; ?></span>
                                                                       <?php } 
                                                                    ?>
                                                                </div>

                                                                <div class="d-flex flex-column">
                                                                    <h6 class="mb-2">Observações:</h6>

                                                                    <?php 
                                                                       $obs_finalizacao = json_decode($finalizacao['observacoes'], true);

                                                                       foreach ($obs_finalizacao as $obs) { ?>
                                                                            <span class="mb-1">* <?= $obs; ?>;</span>
                                                                       <?php } 
                                                                    ?>
                                                                </div>
                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                 
                                            <?php } 
                                        }
                                    }

                                    // verifica se não tem finalizações para exibir
                                    if(count($posicoes) == 0) {
                                        echo '<p class="small">Nenhuma finalização cadastrada!</p>';
                                    }else{
                                        if(count($finalizacaoes) == 0) {
                                            echo '<p class="small">Nenhuma finalização cadastrada!</p>';
                                        }
                                    }
                                ?>
                                <!-- finalizações -->

                            </div>
                            <!-- container finalizações -->

                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <?php } ?>
        <!-- dias -->

    </div>
</section>
<!-- TREINOS -->

<script src="<?php echo $base_url ?>modulos-admin/contents/treinos/js/app.js"></script>








