<?php
require 'db.php';

// Obtém o ID do colaborador a ser deletado
$id = $_GET['id'];

// Prepara e executa a consulta para deletar o colaborador
$stmt = $pdo->prepare("DELETE FROM colaborador WHERE idColaborador = ?");
$stmt->execute([$id]);

// Redireciona de volta para a página principal
header('Location: index.php');
exit;
