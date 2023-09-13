<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="inicialCMS.css">

    <title>Document</title>
</head>
<body>
<nav class="sidebar">
        <!-- Conteúdo da barra de navegação lateral -->
        <ul>
            <li><a href="relatorioCMS.php">Relátorio de Incrições</a></li>
            <li><a href="inicialCMS.php">Adicionar Inscrição</a></li>
            <li><a href="gerenciarCMS.php">Gerenciar Inscrições</a></li>
            <li><a href="#">Sair</a></li>
        </ul>
    </nav>

    <h2>Gerenciamento de Inscrições</h2>


    <!-- Formulário para editar uma inscrição existente -->
    <h2>Editar Inscrição</h2>
    <form action="editar_inscricao.php" method="POST">
        <label for="id_edicao">ID da Inscrição:</label>
        <input type="text" id="id_edicao" name="id_edicao" required><br>

        <label for="novo_nome">Novo Nome Completo:</label>
        <input type="text" id="novo_nome" name="novo_nome"><br>

        <label for="novo_curso">Novo Curso:</label>
        <input type="text" id="novo_curso" name="novo_curso"><br>

        <label for="novo_turno">Novo Turno:</label>
        <input type="text" id="novo_turno" name="novo_turno"><br>

        <button type="submit">Editar Inscrição</button>
    </form>

    <!-- Formulário para excluir uma inscrição existente -->
    <h2>Excluir Inscrição</h2>
    <form action="excluir_inscricao.php" method="POST">
        <label for="id_exclusao">ID da Inscrição a ser excluída:</label>
        <input type="text" id="id_exclusao" name="id_exclusao" required><br>

        <button type="submit">Excluir Inscrição</button>
    </form>
</body>
</html>
