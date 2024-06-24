// adicionar id no modal add finalização treino
function adicionarIdModalAddFinalizacao(id){
    document.getElementById("treino_id_modal_add_finalizacao").value = id
}

// deletar treino 
async function deletarTreino(id){
    loading();
    const res = await fetch(`${base_url}/modulos-admin/contents/treinos/php/deletar-treino.php?id=${id}`)
    const data = await res.json()
    if(data.status){
        let url = new URL(window.location.href);
        url.searchParams.append('delete', 'true');
        window.location.href = url;
    }
}

// deletar finalização treino 
async function deletarFinalizacao(id){
    loading();
    const res = await fetch(`${base_url}/modulos-admin/contents/treinos/php/deletar-finalizacao-treino.php?id=${id}`)
    const data = await res.json()
    if(data.status){
        let url = new URL(window.location.href);
        url.searchParams.append('delete', 'true');
        window.location.href = url;
    }
}

// abrir modal e inserir dados para editar treino
async function editarTreino(id){
    const res = await fetch(`${base_url}/modulos-admin/contents/treinos/php/get-treino.php?id=${id}`)
    const dados = await res.json()

    document.getElementById("aula_treino_editar").value = dados.aula_treino
    document.getElementById("data_treino_editar").value = dados.data_treino
    if(dados.dia_trieno == "Segunda Feira"){
        document.getElementById("seg").selected = true
    } else if(dados.dia_trieno == "Terça Feira"){
        document.getElementById("ter").selected = true
    } else if(dados.dia_trieno == "Quarta Feira"){
        document.getElementById("qua").selected = true
    } else if(dados.dia_trieno == "Quinta Feira"){ 
        document.getElementById("qui").selected = true
    } else if(dados.dia_trieno == "Sexta Feira"){
        document.getElementById('sax').selected = true
    } else if(dados.dia_trieno == "Sábado"){
        document.getElementById('sab').selected = true
    } else if(dados.dia_trieno == "Domingo"){
        document.getElementById('dom').selected = true
    }

    if(dados.hora_treino == "06:30"){
        document.getElementById("06:30").selected = true
    } else if(dados.hora_treino == "12:00"){
        document.getElementById("12:00").selected = true
    } else if(dados.hora_treino == "19:30"){
        document.getElementById("19:30").selected = true
    } else if(dados.hora_treino == "21:00"){
        document.getElementById("21:00").selected = true
    } else if(dados.hora_treino == "22:00"){
        document.getElementById("22:00").selected = true
    }

    if(dados.tipo_treino == 'Jiu Jitsu'){
        document.getElementById("editar_jiu_jitsu").selected = true
    } else if(dados.tipo_treino == 'No Gi'){
        document.getElementById("editar_no_gi").selected = true
    }

    // adicionar observações modal editar;
    let itens = dados.observacoes_treino
    itens = itens.map(item => {
        if (!item.endsWith(';')) {
            item += ';';
        }
        return item.trim();
    });
    itens = itens.filter(item => item);
    let itensString = itens.join('\n');
    document.getElementById("observacoes_treino_editar").value = itensString;
    
    // adicionar imagens modal editar;
    var imagensArray = dados.img_treino
    document.getElementById("container-imgs-modal-treino-editar").innerHTML = "";
    imagensArray.forEach((img)=>{
        document.getElementById("container-imgs-modal-treino-editar").innerHTML += `
            <div id="container-${dados.treino_id}-${img}" class="p-2 d-flex flex-column align-items-center">
                <div class="_container-img-editar">
                <img src="${base_url}/assets/imagens/site-admin/treinos/${img}">
                </div>
    
                <i onclick="removerImgTreinoModalEditar('container-${dados.treino_id}-${img}', '${dados.treino_id}', '${img}')" style="cursor: pointer;" class="mt-1 fs-6 text-danger fas fa-close"></i>
            </div>
        `
    })



    openModal();
}

function openModal() {
    var meuModal = new bootstrap.Modal(document.getElementById('modal-editar-treino'));
    meuModal.show();
}