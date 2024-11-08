// API CEP

document.getElementById("professor_cep").addEventListener("blur", function() {
    let cep = this.value.replace(/\D/g, '');
    if (cep.length === 8) {
        fetch(`https://viacep.com.br/ws/${cep}/json/`)
            .then(response => response.json())
            .then(data => {
                if (!data.erro) {
                    document.getElementById("professor_estado").value = data.uf;
                    document.getElementById("professor_cidade").value = data.localidade;
                    document.getElementById("professor_logradouro").value = data.logradouro;
                    document.getElementById("professor_bairro").value = data.bairro;
                    
                } else {
                    alert("CEP não encontrado.");
                }
            })
            .catch(error => console.error("Erro ao buscar o CEP: " + error));
    } else {
        alert("CEP inválido.");
    }
});