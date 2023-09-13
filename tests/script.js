// Obtém o elemento do formulário e o contador de vagas
const form = document.getElementById('registro-form');
const vagasCont = document.getElementById('vagas-cont');

// Define a quantidade inicial de vagas
let vagasDisponiveis = 20;

// Função para atualizar o contador de vagas
function updateVagasCont() {
    vagasCont.textContent = vagasDisponiveis;
}

// Event listener para o envio do formulário
form.addEventListener('submit', function (e) {
    e.preventDefault();

    // Obtém o valor do campo de nome
    const nomeInput = document.getElementById('nome');
    const nome = nomeInput.value.trim();

    if (nome !== '') {
        // Se o nome for inserido, reduza uma vaga e atualize o contador
        vagasDisponiveis--;
        updateVagasCont();
        nomeInput.value = ''; // Limpa o campo de nome
        alert('Inscrição confirmada! Vagas restantes: ' + vagasDisponiveis);
    } else {
        alert('Por favor, insira um nome válido.');
    }
});

// Inicializa o contador de vagas
updateVagasCont();
