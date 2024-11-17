<?php
include('conecta.php');

// Alterar a consulta para selecionar as bebidas
$sql = "SELECT * FROM bebida";
$result = $conn->query($sql);

session_start();

if (!isset($_SESSION['id_usuario'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freders Bebidas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="css/css_produtos.css">
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
                <li><a href="carrinho.php">CARRINHO</a></li>
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
        <div class="produto-grid">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='pizza-card'>";
                    echo "<img src='" . $row['link_imagem_bebida'] . "' class='card-img-top' alt='Bebida'>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>" . $row['nome_bebida'] . "</h5>";
                    echo "<p class='card-text'>Preço: R$ " . number_format($row['valor_bebida'], 2, ',', '.') . "</p>";
                    ?>
                    <form action="adicionar_carrinho.php" method="POST">
                        <input type="hidden" name="id_bebida" value="<?= $row['id_bebida']; ?>">
                        <label for="quantidade">Quantidade:</label>
                        <input type="number" name="quantidade" value="1" min="1">
                        <button type="submit" class="btn btn-primary">Adicionar ao carrinho</button>
                    </form>
                    <?php
                    echo "</div></div>";
                }
            } else {
                echo "Nenhuma bebida encontrada.";
            }
            ?>
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
