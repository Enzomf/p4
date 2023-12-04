<?php
require './src/functions/validaLogin.php';
validaLogin()




?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./assets/style.css" />

    <title>Cadastro</title>
</head>

<body id="cadastro">
    <main>
        <div class="cadastro">
            <h1>Cadastro</h1>
            <form id="auth-form" method="post" action="./src/casos-de-uso/cadastro-registro/index.php">
                <div class="form-control">
                    <label class="form-control__label">Nome</label>
                    <input type="text" name="nome" id="nome" placeholder="insira o telefone" required />
                </div>
                <div class="form-control">
                    <label class="form-control__label">Telefone </label>
                    <input type="tel" id="telefone" name="telefone" placeholder="insira o telefone" required />
                </div>
                <div class="form-control">
                    <label class="form-control__label">Deficiencia </label>
                    <input type="text" name="deficiencia" id="deficiencia" placeholder="insira a deficiencia" required />
                </div>
                <div class="form-control">
                    <label class="form-control__label">Data de nascimento </label>
                    <input type="date" name="data_nascimento" id="data_nascimento" placeholder="insira a data de nascimento" required />
                </div>
                <?php
                if (isset($_GET['error'])) {
                ?>

                    <div class="form-error">
                        <?php echo  $_GET['error'] ?>
                    </div>
                <?php } ?>
                <div class="form-actions">
                    <div> <a href="./lista-registros.php">Voltar para a listagem de registros</a></div>
                </div>
                <button class="primary-btn" type="submit">Cadastrar</button>
            </form>
    </main>
</body>

</html>