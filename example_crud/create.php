<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nome = $_POST['nome'];
  $email = $_POST['email'];

  $stmt = $pdo->prepare("INSERT INTO colaborador (nome, email) VALUES (?, ?)");
  $stmt->execute([$nome, $email]);

  header('Location: index.php');
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Adicionar Colaborador</title>
</head>

<body>
  <h1>Adicionar Colaborador</h1>
  <form method="POST" action="">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" required><br>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required><br>
    <button type="submit">Adicionar</button>
  </form>
  <a href="index.php">Voltar</a>
</body>

</html>
