       /**********************************************/
      /* Interações e animações da página principal */
     /*             Mobile First                   */
    /**********************************************/

/* CRONÔMETRO COM TEMPO DE FIM DE INSCRIÇÃO */

// Data de término da inscrição do curso
const DataFinal = new Date ("2023-10-21T23:59:59Z"); // Fuso horário "Z" (UTC)

function updateContagemRegressiva(){
    const DataAtual = new Date(); // Váriavel com data atual
    const DiferençaTempo = DataFinal - DataAtual; // Váriavel com diferença entre duas datas

    if (DiferençaTempo <= 0) {

        document.getElementById("ContagemRegressiva").innerHTML = "Inscrições encerradas!";

    } else {
        const Dias = Math.floor(DiferençaTempo / (1000 * 60 * 60 * 24)); // Cálculo para dias
        const Horas = Math.floor((DiferençaTempo % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)); // Cálculo para horas
        const Minutos = Math.floor((DiferençaTempo % (1000 * 60 * 60)) / (1000 * 60)); // Cálculo para minutos
        const Segundos = Math.floor((DiferençaTempo % (1000 * 60)) / 1000); // Cálculo para segundos
        const Millisegundos = DiferençaTempo % 1000; // Cálculo para millísegundos

        const ContagemRegressivaString = `${Dias} Dias,  ${Horas} : ${Minutos} : ${Segundos} : ${Millisegundos}`;
        document.getElementById("ContagemRegressiva").innerHTML = ContagemRegressivaString;

    }
}

    // Atualiza o contador a cada 1 ms (millísegundo)
    setInterval(updateContagemRegressiva, 1);

    // Chama a função de atualização imediatamente para evitar um atraso inicial
    updateContagemRegressiva();