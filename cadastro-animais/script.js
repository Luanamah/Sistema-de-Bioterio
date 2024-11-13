document.getElementById("animalForm").addEventListener("submit", function(event) {
    event.preventDefault();
    
    const nome = document.getElementById("nome").value;
    const idade = document.getElementById("idade").value;
    const peso = document.getElementById("peso").value;
    const especie = document.getElementById("especie").value;
    const caracteristica = document.getElementById("caracteristica").value;

    if (nome && idade && especie) {
        document.getElementById("mensagem").textContent = "Animal cadastrado com sucesso!";
        document.getElementById("animalForm").reset();
    } else {
        document.getElementById("mensagem").textContent = "Preencha todos os campos obrigatórios!";
    }
});
