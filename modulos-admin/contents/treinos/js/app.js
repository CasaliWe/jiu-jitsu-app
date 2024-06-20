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
        url.searchParams.append('success', 'true');
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
        url.searchParams.append('success', 'true');
        window.location.href = url;
    }
}


