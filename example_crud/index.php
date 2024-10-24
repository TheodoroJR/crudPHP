<?php
require 'db.php';

$stmt = $pdo->query("SELECT * FROM colaborador");
$colaboradores = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Listar Usuários</title>
</head>

<body>
  <h1>Usuários</h1>
  <a href="create.php">Adicionar Novo Usuário</a>
  <table border="1">
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>Email</th>
      <th>Ações</th>
    </tr>
    <?php foreach ($colaboradores as $colaborador): ?>
      <tr>
        <td><?= $colaborador['idColaborador'] ?></td>
        <td><?= $colaborador['nome'] ?></td>
        <td><?= $colaborador['email'] ?></td>
        <td>
          <a href="edit.php?id=<?= $colaborador['idColaborador'] ?>">Editar</a>
          <a href="delete.php?id=<?= $colaborador['idColaborador'] ?>" onclick="return confirm('Tem certeza que deseja deletar este colaborador?')">Deletar</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>

</html>
