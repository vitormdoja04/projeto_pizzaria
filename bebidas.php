<?php
include('conecta.php');

$sql = "SELECT * FROM bebida";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freders Pizza</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/css_produtos.css">
    <link rel="stylesheet" href="css/css_geral.css">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <header>
        <a href="index.php"><img src="images\feddy.png" alt="Freders Pizza" id="title_card"></a>
        <nav>
            <ul>
                <li><a href="pizzas.php">PIZZAS</a></li>
                <li><a href="bebidas.php">BEBIDAS</a></li>
                <li><a href="sobremesas.php">SOBREMESAS</a></li>
                <li><a href="login.php">LOGIN</a></li>
                <li><a href="carrinho.php">CARRINHO</a></li>
            </ul>
        </nav>
    </header>
    <br><br>
    <main>
    <div class="primeira_linha">
            <?php
            if ($result->num_rows > 0) {
                // Exibindo as pizzas com CSS Grid
                echo "<div class='produto-grid'>";
            
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='pizza-card'>";
                    echo "<img src='" . $row['link_imagem_bebida'] . "' class='card-img-top' alt='bebida'>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>" . $row['nome_bebida'] . "</h5>";
                    echo "<h5 class='card-title'>" . $row['tamanho_bebida'] . "</h5>";
                    echo "<p class='card-text'>Preço: R$ " . number_format($row['valor_bebida'], 2, ',', '.') . "</p>";
                    echo "<a href='produtos.php' class='btn btn-primary'>Adicionar ao carrinho</a>";
                    echo "</div></div>";
                }
            
                echo "</div>";
            } else {
                echo "Nenhuma pizza encontrada.";
            }
            
            $conn->close();
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