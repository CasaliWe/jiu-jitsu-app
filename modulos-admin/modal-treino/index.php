<!-- modal treino -->
<div class="modal fade" id="modal-treino" tabindex="-1" aria-labelledby="modal-treino" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Adicionar novo dia de treino</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form onsubmit="loading()" action="modulos-admin/contents/treinos/php/adicionar-novo-treino.php" method="post" enctype="multipart/form-data">
          <div class="modal-body">
          
            <div class='mb-3'>
              <label for='tipo_treino' class="small">Tipo do treino*</label>
              <input type='type' id='tipo_treino' name='tipo_treino' placeholder='Ex: jiu jitsu' class='form-control' required>
            </div>

            <div class='mb-3'>
              <label for='aula_treino' class="small">Número da aula*</label>
              <input type='type' id='aula_treino' name='aula_treino' placeholder='Ex: 12º' class='form-control' required>
            </div>

            <div class='mb-3'>
              <label for='dia_treino' class="small">Dia do treino*</label>
              <select name="dia_treino" id="dia_treino" class="form-select">
                <option value="">-- selecione um dia --</option>
                <option value="segunda">Segunda</option>
                <option value="terca">Terça</option>
                <option value="quarta">Quarta</option>
                <option value="quinta">Quinta</option>
                <option value="sexta">Sexta</option>
                <option value="sabado">Sábado</option>
                <option value="domingo">Domingo</option>
              </select>
            </div>

            <div class='mb-3'>
              <label for='hora_treino' class="small">Hora do treino*</label>
              <select name="hora_treino" id="hora_treino" class="form-select">
                 <option value="">-- selecione um horário --</option>
                 <option value="06:30">06:30 hrs</option>
                 <option value="12:00">12:00 hrs</option>
                 <option value="19:30">19:30 hrs</option>
                 <option value="21:00">21:00 hrs</option>
                 <option value="22:00">22:00 hrs</option>
              </select>
            </div>

            <div class='mb-3'>
              <label for='data_treino' class="small">Data do treino*</label>
              <input type='date' id='data_treino' name='data_treino' class='form-control' required>
            </div>

            <div class='mb-3'>
              <label for='img_treino' class="small">Imagem do treino*</label>
              <input type='file' id='img_treino' name='img_treino' class='form-control' required>
            </div>

            <div class='mb-3'>
              <label for='observacoes_treino' class="small">Observações do treino*</label> <br>
              <small>( Separe as observações por ponto e vírgula " ; " )</small>
              <textarea id='observacoes_treino' rows="3" name='observacoes_treino' class='form-control' required></textarea>
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
<!-- modal treino -->