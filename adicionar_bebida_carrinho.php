<?php
include('conecta.php');
session_start();

if (!isset($_SESSION['id_usuario'])) {
    header('Location: login.php');
    exit();
}

$id_usuario = $_SESSION['id_usuario'];
$sql_carrinho = "SELECT * FROM carrinho WHERE id_usuario = $id_usuario AND status = 'aberto'";
$result_carrinho = $conn->query($sql_carrinho);

if ($result_carrinho->num_rows > 0) {
    $carrinho = $result_carrinho->fetch_assoc();
    $id_carrinho = $carrinho['id_carrinho'];
} else {
    $sql_create_carrinho = "INSERT INTO carrinho (id_usuario) VALUES ($id_usuario)";
    if ($conn->query($sql_create_carrinho) === TRUE) {
        $id_carrinho = $conn->insert_id;
    } else {
        echo "Erro ao criar carrinho: " . $conn->error;
        exit();
    }
}

if (isset($_POST['id_bebida'])) {
    $id_bebida = $_POST['id_bebida'];
    $quantidade = $_POST['quantidade'];
    $sql_bebida = "SELECT * FROM bebida WHERE id_bebida = $id_bebida";
    $result_bebida = $conn->query($sql_bebida);
    if ($result_bebida->num_rows > 0) {
        $bebida = $result_bebida->fetch_assoc();
        $preco_unitario = $bebida['valor_bebida'];
        
        $sql_item = "SELECT * FROM item_carrinho WHERE id_carrinho = $id_carrinho AND id_bebida = $id_bebida";
        $result_item = $conn->query($sql_item);
        
        if ($result_item->num_rows > 0) {
            $item = $result_item->fetch_assoc();
            $nova_quantidade = $item['quantidade'] + $quantidade;
            $sql_update = "UPDATE item_carrinho SET quantidade = $nova_quantidade WHERE id_item_carrinho = " . $item['id_item_carrinho'];
            $conn->query($sql_update);
        } else {
            $sql_add_item = "INSERT INTO item_carrinho (id_carrinho, id_bebida, quantidade, preco_unitario) VALUES ($id_carrinho, $id_bebida, $quantidade, $preco_unitario)";
            $conn->query($sql_add_item);
        }
    }
}

header('Location: carrinho.php');
exit();
?>
