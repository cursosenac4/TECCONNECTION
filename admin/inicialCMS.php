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
    <h2>ADICIONAR NOVA INSCRIÇÃO</h2>
    <!-- Formulário de Inscrição -->
<form action="processar_inscricao.php" method="POST">
    <label for="nome">Nome Completo:</label>
    <input type="text" id="nome" name="nome" required><br>

    <label for="curso">Curso:</label>
    <input type="text" id="curso" name="curso" required><br>

    <label for="turno">Turno:</label>
    <select id="turno" name="turno">
        <option value="Manhã">Manhã</option>
        <option value="Tarde">Tarde</option>
        <option value="Noite">Noite</option>
    </select><br>

    <button type="submit">Adicionar Inscrição</button>
</form>

</body>
</html>