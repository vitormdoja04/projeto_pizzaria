<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freders Pizza</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/css_login.css">
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
            <section>
                <h2>Cadastro de Clientes</h2>
                <fieldset><br>
                    <form id="contact_form" method="post" action="">

                        <div class="input">
                            <label for="input_nome" id="negrito">Nome:</label><br>
                            <input type="text" name="input_nome" id="input_nome" maxlength="100"><br><br>
                        </div>
                        
                        <div class="input">
                            <label for="input_cpf" id="negrito">CPF:</label><br>
                            <input type="number" name="input_cpf" id="input_cpf" maxlength="11"><br><br>
                        </div> 

                        <div class="input">
                            <label for="input_email" id="negrito">E-mail:</label><br>
                            <input type="text" name="input_email" id="input_email" maxlength="50"><br><br>
                        </div>

                        <div class="input">
                            <label for="input_fone" id="negrito">Telefone:</label><br>
                            <input type="tel" name="input_fone" id="input_fone" maxlength="12"><br><br>
                        </div>

                        <div class="input">
                            <label for="input_senha" id="negrito">Senha:</label><br>
                            <input type="password" name="input_password" id="input_password" maxlength="12"><br><br>
                        </div>
                        
                        <center>
                            <div class="div_buttons">
                                <input type="submit" value="Enviar">
                                <input type="reset" value="Cancelar"><br>
                            </div>
                        </center>
                    </form>
                </fieldset>
            </section>
        </main>
    </div>
    <br>
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