<?php
require 'db.php';

$id = $_GET['id'];

// Seleciona o colaborador com o ID fornecido
$stmt = $pdo->prepare("SELECT * FROM colaborador WHERE idColaborador = ?");
$stmt->execute([$id]);
$colaborador = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$colaborador) {
  die("Colaborador não encontrado.");
}

// Atualiza o colaborador no banco de dados
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nome = $_POST['nome'];
  $email = $_POST['email'];

  $stmt = $pdo->prepare("UPDATE colaborador SET nome = ?, email = ? WHERE idColaborador = ?");
  $stmt->execute([$nome, $email, $id]);

  header('Location: index.php');
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Editar Colaborador</title>
</head>

<body>
  <h1>Editar Colaborador</h1>
  <form method="POST" action="">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" value="<?= htmlspecialchars($colaborador['nome']) ?>" required><br>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="<?= htmlspecialchars($colaborador['email']) ?>" required><br>
    <button type="submit">Atualizar</button>
  </form>
  <a href="index.php">Voltar</a>
</body>

</html>
