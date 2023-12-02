<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="/style.css" />
</head>

<body id="login">
  <img src="https://images.even3.com.br/c1uz7AUsJZb735Q69CeyuTlRtD8=/fit-in/250x250/smart/even3.blob.core.windows.net/logos/logo2.a5ea37833ee949f08abf.png" alt="logo" />
  <main>
    <form id="auth-form" method="post">
      <h1>Login</h1>
      <div class="form-control">
        <label class="form-control__label" id="email" for="email">E-mail</label>
        <input type="email" name="email" placeholder="Email" required />
      </div>
      <div class="form-control">
        <label class="form-control__label" id="senha" for="senha">Senha</label>
        <input type="senha" name="senha" placeholder="Senha" required />
      </div>
      <div class="form-actions">
        Ainda não possui uma conta ? <a href="cadastro.php">clique aqui</a>
      </div>

      <button class="primary-btn">entrar</button>
    </form>

  </main>
</body>

</html>