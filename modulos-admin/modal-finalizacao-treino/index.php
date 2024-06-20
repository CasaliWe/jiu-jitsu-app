<!-- modal add finalização treino -->
<div class="modal fade" id="modalAddFinalizacao" tabindex="-1" aria-labelledby="modalAddFinalizacao" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Adicionar nova finalização +</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form onsubmit="loading()" action="modulos-admin/contents/treinos/php/adicionar-nova-finalizacao.php" method="post" enctype="multipart/form-data">
          <div class="modal-body">

              <!-- id treino -->
              <input type="hidden" name="treino_id" value="" id="treino_id_modal_add_finalizacao">      

              <div class='mb-3'>
                <label for='categoria_finalizacao' class="small">Categoria*</label>
                <select class="form-select" name="categoria_finalizacao" required id="categoria_finalizacao">
                    <option value="">-- Selecione uma categoria --</option>
                    <option value="Passador">Passador</option>
                    <option value="Guardeiro">Guardeiro</option>
                </select>
              </div>

              <div class='mb-3'>
                <label for='posicao_finalizacao' class="small">Posição*</label>
                <input type="text" required name="posicao_finalizacao" id="posicao_finalizacao" class="form-control">
              </div>

              <div class='mb-3'>
                <label for='finalizacao' class="small">Finalização*</label>
                <input type="text" required name="finalizacao" id="finalizacao" class="form-control">
              </div>

              <div class='mb-3'>
                <label for='passo-a-passo' class="small">Construção (passo a passo)*</label>
                <textarea class="form-control" name="passo-a-passo" required rows="5" id="passo-a-passo"></textarea>
              </div>

              <div class='mb-3'>
                <label for='obs_finalizacao' class="small">Obervações da finalização*</label>
                <textarea class="form-control" name="obs_finalizacao" required rows="5" id="obs_finalizacao"></textarea>
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-primary">Adicionar</button>
          </div>
      </form>
    </div>
  </div>
</div>
<!-- modal add finalização treino -->



<script>
  // mask passo a passo
  document.getElementById('passo-a-passo').addEventListener('input', function(e) {
      var value = e.target.value;
      var linhas = (value.match(/\n/g) || []).length;
      if (value.length === 1 && value[0] !== '1- ') {
          e.target.value = '1- ' + value;
      } else if (value.slice(-1) === ';' && value.slice(-3) !== (linhas + 1) + '- ' && linhas < 5) {
          e.target.value = value + '\n' + (linhas + 2) + '- ';
      }
  });

  document.getElementById('passo-a-passo').addEventListener('keydown', function(e) {
      if (e.key === 'Enter') {
          e.preventDefault(); // impede a quebra de linha padrão
          var value = e.target.value;
          var linhas = (value.match(/\n/g) || []).length;
          if (value.slice(-1) !== ';' && value.slice(-3) !== (linhas + 1) + '- ' && linhas < 5) {
              e.target.value = value + ';\n' + (linhas + 2) + '- ';
          }
      }
  });

  // mask observações
  document.getElementById('obs_finalizacao').addEventListener('input', function(e) {
      var value = e.target.value;
      var asteriscos = (value.match(/\*/g) || []).length;
      if (value.length === 1 && value[0] !== '*' && asteriscos < 5) {
          e.target.value = '* ' + value;
      } else if (value.slice(-1) === ';' && value.slice(-3) !== '* ;' && asteriscos < 5) {
          e.target.value = value + '\n* ';
      }
  });

  document.getElementById('obs_finalizacao').addEventListener('keydown', function(e) {
      if (e.key === 'Enter') {
          e.preventDefault(); // impede a quebra de linha padrão
          var value = e.target.value;
          var asteriscos = (value.match(/\*/g) || []).length;
          if (value.slice(-1) !== ';' && value.slice(-3) !== '* ;' && asteriscos < 5) {
              e.target.value = value + ';\n* ';
          }
      }
  });
</script>