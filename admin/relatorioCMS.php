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
    <h2>Relatório de Inscrições</h2>

    <!-- Formulário de pesquisa -->
    <form action="" method="POST">
        <label for="pesquisar">Pesquisar por Nome:</label>
        <input type="text" id="pesquisar" name="pesquisar">
        <button type="submit">Pesquisar</button>
    </form>
    </body>

    <?php
    // Conectar ao banco de dados (substitua com suas informações)
    $hostname = 'localhost';
    $username = 'seu_usuario';
    $password = 'sua_senha';
    $database = 'seu_banco_de_dados';

    $conn = new mysqli($hostname, $username, $password, $database);

    if ($conn->connect_error) {
        die("Erro na conexão: " . $conn->connect_error);
    }

    // Consulta SQL para recuperar todas as inscrições ou realizar uma pesquisa
    $sql = "SELECT * FROM inscricoes";
    
    if (isset($_POST['pesquisar'])) {
        $pesquisa = $_POST['pesquisar'];
        $sql .= " WHERE nome LIKE '%$pesquisa%'";
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Mostrar o número total de inscritos
        echo "<p>Total de inscritos: " . $result->num_rows . "</p>";

        // Tabela para exibir os resultados
        echo '<table>';
        echo '<tr><th>ID</th><th>Nome Completo</th></tr>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['nome'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo '<p>Nenhum resultado encontrado.</p>';
    }

    $conn->close();
    ?>

</html>
