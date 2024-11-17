<?php
include('conecta.php');

session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['id_usuario'])) {
    header('Location: login.php');
    exit();
}

// Pega o ID do usuário logado
$id_usuario = $_SESSION['id_usuario'];

// Consulta os itens no carrinho do usuário
$sql = "
    SELECT ic.id_item_carrinho, p.sabor_pizza, b.nome_bebida, s.nome_sobremesa, ic.quantidade, 
           ic.preco_unitario, (ic.quantidade * ic.preco_unitario) AS total_item
    FROM item_carrinho ic
    LEFT JOIN pizza p ON ic.id_pizza = p.id_pizza
    LEFT JOIN bebida b ON ic.id_bebida = b.id_bebida
    LEFT JOIN sobremesa s ON ic.id_sobremesa = s.id_sobremesa
    WHERE ic.id_carrinho = (SELECT id_carrinho FROM carrinho WHERE id_usuario = ? AND status = 'aberto')
";

$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $id_usuario); // Passa o id do usuário para a consulta
$stmt->execute();
$result = $stmt->get_result();

$itens = [];
$total_carrinho = 0;

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $itens[] = $row;
        $total_carrinho += $row['total_item'];
    }
} else {
    $mensagem = "Seu carrinho está vazio!";
}

$stmt->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho - Freders Pizza</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="css/css_carrinho.css">
    <link rel="stylesheet" href="css/css_geral.css">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <header>
        <a href="index.php"><img src="images\feddy.png" alt="Freders Pizza" id="title_card"></a>
        <nav>
            <ul>
            <li><a href="pizzas.php">PIZZAS</a></li>
            <li><a href="bebidas.php">BEBIDAS</a></li>
            <li><a href="sobremesas.php">SOBREMESAS</a></li>
            <li><a href="carrinho.php" style="color: red">CARRINHO</a></li>

            <?php if (isset($_SESSION['id_usuario'])): ?>
                <li><span>Olá, <?= $_SESSION['nome']; ?></span></li>
                <li><a href="sair.php">SAIR</a></li>
            <?php else: ?>
                <li><a href="login.php">LOGIN</a></li>
                <li><a href="cadastro.php">CADASTRE-SE</a></li>
            <?php endif; ?>
            </ul>
        </nav>
    </header>
    
    <br><br>
    <main>            
    <div class="container">
        <h1>Carrinho de Compras</h1>
        <?php if (!empty($itens)): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Quantidade</th>
                        <th>Preço Unitário</th>
                        <th>Total</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($itens as $item): ?>
                        <tr>
                            <td>
                                <?= $item['sabor_pizza'] ?? $item['nome_bebida'] ?? $item['nome_sobremesa'] ?>
                            </td>
                            <td>
                                <?= $item['quantidade'] ?>
                            </td>
                            <td>
                                R$ <?= number_format($item['preco_unitario'], 2, ',', '.') ?>
                            </td>
                            <td>
                                R$ <?= number_format($item['total_item'], 2, ',', '.') ?>
                            </td>
                            <td>
                                <a href="remover_item.php?id=<?= $item['id_item_carrinho'] ?>" class="btn btn-danger">Remover</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <h3>Total do Carrinho: R$ <?= number_format($total_carrinho, 2, ',', '.') ?></h3>
            
        <?php else: ?>
            <p><?= $mensagem ?? 'Seu carrinho está vazio!' ?></p>
        <?php endif; ?>
    </div>
    </main>
    <br><br>
    <footer>
        <section id="footer">
            <div class="contact-info">
                <center>
                <h2 id="h2-footer">Informações de contato</h2>
                <p id="email">E-mail: <a href="mailto:freders.pizza@hotmail.com">freders.pizza@hotmail.com</a></p>
                <p id="number">Telefone: <a href="tel:+5055034455">+(505) 503-4455</a></p>
                <p id="cnpj">CNPJ: 87.123.456/789-89</p>
                <p id="address">Endereço: Praça Samuel Sabatini, 50 - São Bernardo do Campo - SP</p>
                </center>
            </div>
        </section>
    </footer>
</body>
</html>
