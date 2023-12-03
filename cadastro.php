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
            <form id="auth-form" method="post" action="./src/casos-de-uso/cadastro-usuario/index.php">
                <div class="form-control">
                    <label class="form-control__label">Nome</label>
                    <input type="text" name="nome" id="nome" placeholder="insira seu nome" required />
                </div>
                <div class="form-control">
                    <label class="form-control__label">E-mail </label>
                    <input type="email" id="email" name="email" placeholder="insira seu e-mail" required />
                </div>
                <div class="form-control">
                    <label class="form-control__label">Senha </label>
                    <input type="password" name="senha" id="senha" placeholder="insira sua senha" required />
                </div>
                <div class="form-control">
                    <label class="form-control__label">Confirmação de senha </label>
                    <input type="password" name="confirmacaoSenha" id="confirmacaoSenha" placeholder="confirme sua senha" required />
                </div>
                <?php
                if (isset($_GET['error'])) {
                ?>

                    <div class="form-error">
                        <?php echo  $_GET['error'] ?>
                    </div>
                <?php } ?>
                <div class="form-actions">
                    <div>Já possui uma conta ? <a href="./login.php">clique aqui</a></div>
                </div>
                <button class="primary-btn" type="submit">Cadastrar</button>
            </form>
    </main>
</body>

</html>