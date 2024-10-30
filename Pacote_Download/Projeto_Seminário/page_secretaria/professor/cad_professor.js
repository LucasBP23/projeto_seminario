// Função para carregar os estados
function carregarEstados() {
    fetch('https://servicodados.ibge.gov.br/api/v1/localidades/estados?orderBy=nome')
        .then(response => response.json())
        .then(estados => {
            const estadoSelect = document.getElementById('professor_estado');
            estados.forEach(estado => {
                let option = document.createElement('option');
                option.value = estado.sigla;
                option.text = estado.sigla;
                estadoSelect.add(option);
            });
        })
        .catch(error => console.error('Erro ao carregar os estados:', error));
}

// Função para carregar as cidades quando um estado for selecionado
function carregarCidades(estadoId) {
    const cidadeSelect = document.getElementById('professor_cidade'); // 
    cidadeSelect.disabled = true; // Desabilitar o campo enquanto carrega as cidades
    cidadeSelect.innerHTML = '<option value="">Selecione uma cidade</option>'; // Resetar as opções

    fetch(`https://servicodados.ibge.gov.br/api/v1/localidades/estados/${estadoId}/municipios?orderBy=nome`)
        .then(response => response.json())
        .then(cidades => {
            cidades.forEach(cidade => {
                let option = document.createElement('option');
                option.value = cidade.nome;
                option.text = cidade.nome;
                cidadeSelect.add(option);
            });
            cidadeSelect.disabled = false; // Reabilitar o campo após carregar as cidades
        })
        .catch(error => console.error('Erro ao carregar as cidades:', error));
}

// Adicionar eventos
document.getElementById('professor_estado').addEventListener('change', function() { // Ajustado para professor_estado
    const estadoId = this.value;
    if (estadoId) {
        carregarCidades(estadoId);
    } else {
        document.getElementById('professor_cidade').disabled = true; 
        document.getElementById('professor_cidade').innerHTML = '<option value="">Selecione uma cidade</option>';
    }
});

// Chamar a função de carregar estados ao carregar a página
carregarEstados();
