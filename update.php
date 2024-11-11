<?php
include 'conexao.php'; // Inclui o arquivo de conexão

if (isset($_GET['id'])) { // Verifica se o ID foi passado
    $id = $_GET['id']; // Recebe o ID
    $sql = "SELECT * FROM roupas WHERE id=$id"; // Consulta o usuário
    $result = $conn->query($sql); // Executa a consulta
    $roupas= $result->fetch_assoc(); // Obtém os dados do usuário
}

// Se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $produtos = $_POST['produtos']; // Recebe o novo nome
    $cor = $_POST['cor']; // Recebe o novo email
    $tamanho = $_POST['tamanho']; // Recebe o novo email
    $descricao= $_POST['descricao']; // Recebe o novo email
    $sql = "UPDATE roupas SET produtos='$produtos', cor='$cor', tamanho='$tamanho', descricao='$descricao' WHERE id=$id"; // Prepara a atualização

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php"); // Redireciona se a atualização for bem-sucedida
    } else {
        echo "Erro: " . $conn->error; // Mostra erro, se houver
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Atualizar Produto</title>
</head>
<body>
    <h1>Atualizar Produto</h1>
    <form action="" method="POST">
        <label>Produto:</label>
        <input type="text" name="produtos" value="<?php echo $roupas['produtos']; ?>" required>
        <label>Cor:</label>
        <input type="text" name="cor" value="<?php echo $roupas['cor']; ?>" required>
        <label>Tamanho:</label>
        <input type="text" name="tamanho" value="<?php echo $roupas['tamanho']; ?>" required>
        <label>Descrição</label>
        <input type="text" name="descricao" value="<?php echo $roupas['descricao']; ?>" required>
        <input type="submit" value="Atualizar">
    </form>
    <a href="index.php">Cancelar</a> <!-- Link para voltar -->
</body>
</html>