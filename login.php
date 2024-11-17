<?php
session_start();

include 'conecta.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['input_email'];
    $senha = $_POST['input_password'];

    $query = "SELECT * FROM usuario WHERE email = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) {
        $usuario = mysqli_fetch_assoc($result);
        if ($senha == $usuario['senha']) {
            $_SESSION['id_usuario'] = $usuario['id_usuario'];
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['email'] = $usuario['email'];
            header('Location: index.php');
            exit();
        } else {
            $erro = "Senha incorreta!";
        }
    } else {
        $erro = "E-mail não encontrado!";
    }

    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freders Pizza - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/css_login.css">
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
    <div class="container">
        <main>
            <section>
                <h2>Login de clientes</h2>
                <fieldset><br>
                    <form id="contact_form" method="post" action="">

                        <div class="input">
                            <label for="input_email" id="negrito">E-mail:</label><br>
                            <input type="text" name="input_email" id="input_email" maxlength="50" required><br><br>
                        </div>

                        <div class="input">
                            <label for="input_senha" id="negrito">Senha:</label><br>
                            <input type="password" name="input_password" id="input_password" maxlength="12" required><br><br>
                        </div>
                        
                        <center>
                            <div class="div_buttons">
                                <input type="submit" value="Enviar">
                                <input type="reset" value="Cancelar"><br>
                            </div>
                        </center>
                        
                        <center>
                            <br>
                            <div class="div_buttons">
                            <a>Não tem uma conta?</a><br>
                            <a href="cadastro.php" class="button" id="login_button">Cadastre-se agora!</a>
                            <br>
                            </div>
                        </center>

                        <?php if (isset($erro)): ?>
                            <div class="alert alert-danger mt-3" role="alert">
                                <?= $erro; ?>
                            </div>
                        <?php endif; ?>

                    </form>
                </fieldset>
            </section>
        </main>
    </div>
    <br>
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
