<?php
    include_once 'config/config.php';
?>


<!-- OBSERVAÇÕES -->
<section>
    <h6 class="small mb-5">Veja todas as suas <strong>observações</strong> dos seus <strong>treinos</strong>!</h6>

    <div>
        <?php for ($i = count($observacoes) - 1; $i >= 0; $i--) {
                if(strpos($observacoes[$i], ';') !== false){
                    echo "<p class='py-2 border-bottom'>* $observacoes[$i]</p>";
                }else{
                    echo "<p class='py-2 border-bottom'>* $observacoes[$i];</p>";
                }
        } ?>
    </div>
</section>
<!-- OBSERVAÇÕES -->