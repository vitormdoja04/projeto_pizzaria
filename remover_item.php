<?php
include('conecta.php');

session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['id_usuario'])) {
    header('Location: login.php');
    exit();
}

$id_item_carrinho = $_GET['id']; // Pega o ID do item a ser removido

// Remove o item do carrinho
$sql = "DELETE FROM item_carrinho WHERE id_item_carrinho = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $id_item_carrinho);
$stmt->execute();

header('Location: carrinho.php'); // Redireciona para a página do carrinho
exit();
?>
