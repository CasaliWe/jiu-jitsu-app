<?php
    include_once 'config/config.php';
?>

<link rel="stylesheet" href="<?php echo $base_url ?>modulos-admin/contents/treinos/css/style.css">

<!-- TREINOS -->
<section>
    <h6 class="small mb-4">Aqui você pode <strong>Adicionar</strong> todos os seus treinos!</h6>

    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modal-treino">Adicionar novo treino +</button>

    <!-- dias -->
    <div class="my-4 item-acordion accordion">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#treino-1" aria-expanded="false" aria-controls="treino-1">
                    <div class="d-flex align-items-center justify-content-between w-100 ps-2 pe-4">
                        <div class="d-flex flex-column text-start">
                            <span class="mb-1 small fw-semibold">Jiu Jitsu</span>
                            <span class="small"> <span class="text-primary fw-semibold">41º</span> aula </span>
                        </div>

                        <div class="d-flex flex-column text-end">
                            <span class="mb-1 small d-none d-lg-block">Segunda Feira - 19:30 hrs</span>
                            <span class="small d-none d-lg-block">17 de junho de 2024</span>

                            <span class="mb-1 small d-block d-lg-none">Seg - 19:30 hrs</span>
                            <span class="small d-block d-lg-none">17-06-2024</span>
                        </div>
                    </div>
                </button>
            </h2>
            <div id="treino-1" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
    
                    <div class="row my-3">
                        <div class="mb-4 col-12 col-lg-6 col-xxl-5">
                            <div class="container-img-treino"> <img src="<?= $base_url; ?>assets/imagens/site-admin/banner-login.jpg"> </div>
                        </div>

                        <div class="mb-4 col-12 col-lg-6 col-xxl-3 px-3">
                            <h6 class="fw-semibold mb-3">Observações gerais:</h6>

                            <div class="small d-flex flex-column">
                                <span class="mb-1">* Treino de Jiu Jitsu;</span>
                                <span class="mb-1">* Treino de Jiu Jitsu;</span>
                                <span class="mb-1">* Treino de Jiu Jitsu;</span>
                                <span class="mb-1">* Treino de Jiu Jitsu;</span>
                            </div>
                        </div>

                        <!-- container finalizações -->
                        <div class="col-12 col-lg-12 col-xxl-4 px-3 px-xxl-4">
                            
                            <div class="mb-3 d-flex flex-column flex-lg-row justify-content-between align-items-start align-items-lg-center">
                                <h6 class="fw-semibold">Finalizações do dia:</h6>
                                <button class="btn btn-success btn-sm">finalizações +</button>
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
        <!-- dias -->

    </div>
</section>
<!-- TREINOS -->

<script src="<?php echo $base_url ?>modulos-admin/contents/treinos/js/app.js"></script>








