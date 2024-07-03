<?php
    include_once 'config/config.php';
?>


<!-- FINALIZAÇÕES -->
<section>
    <h6 class="small mb-4">Adicione, remova ou atualize todas as suas <strong>finalizações</strong>!</h6>

    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalAddFinalizacao">Adicionar finalizações +</button>

    <div class="mt-5 row pb-0 pb-lg-3">
        <div class="mb-3 mb-lg-0 col-12 col-lg-6">
            <label for="categoria-finalizacao" class="small">Selecione a categoria*</label>
            <select onchange="selecionarPosicoesCategoria()" class="form-select" id="categoria-finalizacao">
                <option value=""></option>
                <option value="Guardeiro">Guardeiro</option>
                <option value="Passador">Passador</option>
            </select>
        </div>

        <div class="mb-3 mb-lg-0 col-12 col-lg-6">
            <label for="posicao-finalizacao" class="small">Selecione a posição*</label>
            <select onchange="selecionarFinalizacoesDaPosicao()" disabled class="form-select" id="posicao-finalizacao">
                <!-- vem do js -->
            </select>
        </div>
    </div>

    <div class="mt-5" id="container-recebe-finalizacoes">
        <!-- vem do js -->
    </div>
</section>



<script src="<?= $base_url ?>modulos-admin/contents/finalizacoes/js/app.js"></script>