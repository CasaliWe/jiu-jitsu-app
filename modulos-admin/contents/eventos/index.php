<?php
    include_once 'config/config.php';
?>

<style>
    ._container_imagem_evento{
        width: 100%;
        height: auto;
    }
    ._container_imagem_evento img{
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }

    ._titulo_evento{
        line-height: 1.2;
        max-height: calc(1.2em * 2);
        min-height: calc(1.2em * 2);
        overflow: hidden;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
        text-overflow: ellipsis;
    }

    ._btn_evento{
        width: 35%;
    }
</style>


<!-- EVENTOS -->
<section>
    <h6 class="small mb-5">Veja os próximos <strong>eventos</strong> na sua <strong>região</strong>!</h6>

    <div class="row">
        <?php foreach ($eventos as $evento) { ?>
            <div class="mb-5 py-2 py-lg-0 px-4 px-3 col-12 col-lg-4">
                <h5 class="text-secondary _titulo_evento"><?= $evento['titulo']; ?></h5>
                <p class="my-0">Data: <?= $evento['data']; ?></p>
                <div class="_container_imagem_evento">
                    <img src="<?= $evento['imagem']; ?>">
                </div>
                <a href="<?= $evento['link']; ?>" target="_blank" class="_btn_evento mt-4 btn btn-dark">Acessar</a>
            </div>
        <?php } ?>
    </div>

</section>
<!-- EVENTOS -->





