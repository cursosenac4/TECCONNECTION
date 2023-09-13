       /**********************************************/
      /* Interações e animações da página principal */
     /*             Mobile First                   */
    /**********************************************/

/* CÓDIGO PARA CONTAGEM DE VAGAS */

// Obtém o elemento do formulário e o contador de vagas
const form = document.getElementById('registro-form');
const contagemVagas = document.getElementById('cont-vagas');

// Define a quantidade inicial de vagas
let vagasDisponiveis = 20;

// Função para atualizar o contador de vagas
function updateVagasCont() {
    contagemVagas.textContent = vagasDisponiveis;
}

// Event listener para o envio do formulário
form.addEventListener('submit', function (e) {
    e.preventDefault();

    // Obtém o valor do campo de nome
    const InputNome = document.getElementById('nome');
    const nome = InputNome.Value.trim();

    if (nome !==''){ 
        // Se o nome for inserido, reduza uma vaga e atualize o contador
        vagasDisponiveis--;
        updateVagasCont();
        InputNome.value = ''; // Limpa o campo de nome
        alert('Inscrição confirmada! Vagas restantes: ' + vagasDisponiveis);
    } else {
        alert('Por favor, insira um nome válido.');
    }
});

// Inicializa o contador de vagas
updateVagasCont();
