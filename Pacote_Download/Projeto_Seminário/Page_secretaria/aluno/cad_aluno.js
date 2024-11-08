// API VIA CEP

document.getElementById("aluno_cep").addEventListener("blur", function() {
    let cep = this.value.replace(/\D/g, '');
    if (cep.length === 8) {
        fetch(`https://viacep.com.br/ws/${cep}/json/`)
            .then(response => response.json())
            .then(data => {
                if (!data.erro) {
                    document.getElementById("aluno_estado").value = data.uf;
                    document.getElementById("aluno_cidade").value = data.localidade;
                    document.getElementById("aluno_logradouro").value = data.logradouro;
                    document.getElementById("aluno_bairro").value = data.bairro;
                    
                } else {
                    alert("CEP não encontrado.");
                }
            })
            .catch(error => console.error("Erro ao buscar o CEP: " + error));
    } else {
        alert("CEP inválido.");
    }
});