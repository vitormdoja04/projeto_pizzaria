<?php
include('carrossel.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freders Pizza</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Seu CSS personalizado -->
    <link rel="stylesheet" href="css/css_home.css">
    <link rel="stylesheet" href="css/css_geral.css">
</head>
<body>

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
<div class="container">
    <main>
        <div class="card" style="width: 95%; height: 70%;">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner" id="carousel-images">
                    <?php
                    // Verificando se há imagens para exibir no carrossel
                    if (count($carousel_images) > 0) {
                        $is_active = true; // Primeira imagem vai ser 'ativa'
                        foreach ($carousel_images as $index => $image) {
                            // Define a classe 'active' para a primeira imagem
                            $active_class = $is_active ? 'active' : '';
                            echo "<div class='carousel-item $active_class'>
                                      <img src='$image' class='d-block w-100 carousel-image' alt='Imagem Carrossel'>
                                  </div>";
                            $is_active = false; // Apenas a primeira imagem terá a classe 'active'
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title">Bem-vindo à Frederico Fazorso Pizzarias!</h5>
                <br>
                <p class="card-text">Na Frederico Fazorso, cada pizza é uma verdadeira obra-prima, criada com ingredientes frescos, saborosos e uma dose extra de carinho. Com um toque único de tradição e inovação, buscamos oferecer a você uma experiência gastronômica memorável, em cada pedaço.</p>
                <a href="produtos.php" class="btn btn-primary">Ver Produtos</a>
            </div>
        </div>
    </main>
</div>

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

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ZvpUoO/+PpK8c3jw5pRl4fO8qBzBbbtsZT1wpL7gPck5D62O9weo6j7Wqf0/Ub8f2" crossorigin="anonymous"></script>

<!-- Seu script JS para o carrossel -->
<script src="js/script.js"></script>

</body>
</html>
