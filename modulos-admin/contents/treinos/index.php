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
                        <div class="d-flex align-items-center justify-content-between w-100 ps-2 pe-4">
                            <div class="d-flex flex-column text-start">
                                <span class="mb-1 small fw-semibold"><?= $treino['tipo_treino']; ?></span>
                                <span class="small"> <span class="text-primary fw-semibold"><?= $treino['aula_treino']; ?></span> aula </span>
                            </div>

                            <div class="d-flex flex-column text-end">
                                <span class="mb-1 small d-none d-lg-block"><?= $treino['dia_treino']; ?> - <?= $treino['hora_treino']; ?> hrs</span>
                                <span class="small d-none d-lg-block"><?= $data_completa; ?></span>

                                <span class="mb-1 small d-block d-lg-none"><?= substr($treino['dia_treino'], 0, 3); ?> - <?= $treino['hora_treino']; ?> hrs</span>
                                <span class="small d-block d-lg-none"><?= $data_reduzida; ?></span>
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
                            <div class="col-12 col-lg-12 col-xxl-4 px-3 px-xxl-4">
                                
                                <div class="mb-3 d-flex flex-column flex-lg-row justify-content-between align-items-start align-items-lg-center">
                                    <h6 class="fw-semibold">Finalizações do dia:</h6>
                                    <button type="button" onclick="adicionarIdModalAddFinalizacao('<?= $treino['treino_id']; ?>')" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalAddFinalizacao">finalizações +</button>
                                </div>

                                <!-- finalizações -->
                                <div class="mb-3 item-acordion accordion">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#finalizacao-id-1" aria-expanded="false" aria-controls="finalizacao-id-1">
                                                TRIÂNGULO
                                            </button>
                                        </h2>
                                        <div id="finalizacao-id-1" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                
                                                <div class="d-flex flex-column mb-3">
                                                    <h6 class="mb-2">Passo a passo:</h6>

                                                    <span class="mb-1">1- Passar perna pelo pescoço;</span>
                                                    <span class="mb-1">2- Fechar atrás do joelho;</span>
                                                    <span class="mb-1">3- Puxar Cabeça;</span>
                                                </div>

                                                <div class="d-flex flex-column">
                                                    <h6 class="mb-2">Observações:</h6>

                                                    <span class="mb-1">* Travar braço para não escapar;</span>
                                                    <span class="mb-1">* Regra dos 4 segundos;</span>
                                                </div>
                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- finalizações -->

                            </div>
                            <!-- container finalizações -->

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








