<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freders Pizza</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/css_home.css">
    <link rel="stylesheet" href="css/css_geral.css">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <header>
        <a href="index.php"><img src="" alt="Freders Pizza" id="title_card"></a>
        <nav>
            <ul>
                <li><a href="produtos.php">CARDÁPIO</a></li>
                <li><a href="login.php">CADASTRE-SE</a></li>
                <li><a href="carrinho.php">CARRINHO</a></li>
            </ul>
        </nav>
    </header>
    <br><br>
    <div class="container">
    <main>
        <div class="card" style="width: 95%; height: 70%;">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="images/marguerita.jpg" class="d-block w-100" alt="marguerita">
            </div>
            <div class="carousel-item">
            <img src="images/havaiana.jpg" class="d-block w-100" alt="havaina">
            </div>
            <div class="carousel-item">
            <img src="images/ricotta.jpg" class="d-block w-100" alt="ricotta">
            </div>
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
                <h2 id="h2-footer">Contact Info</h2><br>
                <p id="email">Email: <a href="mailto:freders.pizza@hotmail.com">freders.pizza@hotmail.com</a></p><br>
                <p id="number">Number: <a href="tel:+5055034455">+(505) 503-4455</a></p>
            </div>
        </section>
    </footer>    
</body>
</html>