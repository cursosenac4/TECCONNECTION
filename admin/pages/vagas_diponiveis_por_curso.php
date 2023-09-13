<?php include '../templates/main-template.php'; ?>


<body>
    <div class="container">
        <div class="row" id="card-cursos">
            <div class="col-3 border p-5">
                <div>
                    <button class="btn btn-primary btn-sm m-3" onclick="verificar_vagas(this, 1)" id="verificar_vagas_curso_1">Verificar vagas</button>
                    <button class="btn btn-success btn-sm m-3 d-none" id="inscricao_curso_1">Ir para Inscrição</button>
                    <p id="status_request_verificar_vagas_curso_1"></p>
                </div>
            </div>
            <div class="col-3 border p-5">
                <div>
                    <button class="btn btn-primary btn-sm m-3" onclick="verificar_vagas(this, 2)" id="verificar_vagas_curso_2">Verificar vagas</button>
                    <button class="btn btn-success btn-sm m-3 d-none" id="inscricao_curso_2">Ir para Inscrição</button>
                    <p id="status_request_verificar_vagas_curso_2"></p>
                </div>
            </div>
            <div class="col-3 border p-5">
                <div>
                    <button class="btn btn-primary btn-sm m-3" onclick="verificar_vagas(this, 3)" id="verificar_vagas_curso_3">Verificar vagas</button>
                    <button class="btn btn-success btn-sm m-3 d-none" id="inscricao_curso_3">Ir para Inscrição</button>
                    <p id="status_request_verificar_vagas_curso_3"></p>
                </div>
            </div>
            <div class="col-3 border p-5">
                <div>
                    <button class="btn btn-primary btn-sm m-3" onclick="verificar_vagas(this, 4)" id="verificar_vagas_curso_4">Verificar vagas</button>
                    <button class="btn btn-success btn-sm m-3 d-none" id="inscricao_curso_4">Ir para Inscrição</button>
                    <p id="status_request_verificar_vagas_curso_4"></p>
                </div>
            </div>
        </div>
    </div>

</body>
<script>
    const verificar_vagas = (el, id_curso) => {
        const url = `http://localhost/Backend-TEC-CONNECT/admin/api/get_vagas_diponiveis_por_curso.php?id_curso=${id_curso}`;

        el.classList.add('disabled');

        let p_error = document.getElementById(`status_request_verificar_vagas_curso_${id_curso}`);
        let p_success = document.getElementById(`status_request_verificar_vagas_curso_${id_curso}`);

        fetch(url)
            .then(response => response.json())
            .then(numVagas => {

                console.log(numVagas);

                let vagas_disponiveis = numVagas;
                if (vagas_disponiveis === 0) throw Error('Sem vagas disponíveis.  :(');

                el.classList.toggle('d-none');
                document.getElementById('inscricao_curso_' + id_curso).classList.toggle('d-none');
                p_success.classList.add('text-success');
                p_success.textContent = 'Pode se Inscrever-se';

            })
            .catch(error => {
                console.error(error.message);

                el.classList.toggle('btn-danger');
                p_error.classList.add('text-danger');
                p_error.textContent = error.message;

                setTimeout(() => {
                    p_error.textContent = '';
                    el.classList.remove('btn-danger');
                    el.classList.remove('disabled');
                    console.log('fim interval')
                }, 3000)
            });
    }
</script>

</html>