<?php
    // Conexão com o banco de dados
    $conn = new mysqli('localhost', 'root', '', 'pizzaria');
    
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Consultar as imagens de pizzas e sobremesas de forma aleatória
    $sql = "(
                SELECT link_imagem_pizza AS link_imagem FROM pizza
                ORDER BY RAND() LIMIT 3
            )
            UNION ALL
            (
                SELECT link_imagem_sobremesa AS link_imagem FROM sobremesa
                ORDER BY RAND() LIMIT 3
            )";

    $result = $conn->query($sql);

    $carousel_images = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $carousel_images[] = $row['link_imagem'];
        }
    }

    $conn->close();
?>
