<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="https://t4.ftcdn.net/jpg/06/50/47/01/240_F_650470107_hyNulX2cvkBkdRIANoHjkE0jLPw51Eu5.jpg" type="image/x-icon">

    <title>Usuários</title>
    <link rel="stylesheet" type="text/css" href="./style.css" />
  </head>
  <body>
    <header class="logo">
      <img
        src="https://images.even3.com.br/c1uz7AUsJZb735Q69CeyuTlRtD8=/fit-in/250x250/smart/even3.blob.core.windows.net/logos/logo2.a5ea37833ee949f08abf.png"
        alt="logo"
      />
    </header>
    <main>
      <div class="container">
        <h2 class="titulo">Usuários cadastrados</h2>
        <ul class="lista">
          <li>
            <?php

            include_once './php/classes/casos-de-uso/listar-usuarios/index.php';

            $listarUsuariosUseCase = getListarUsuariosUsCaseInstance();
            $listaUsuarios = $listarUsuariosUseCase->execute();

            foreach ($listaUsuarios as $usuario) {
              echo '<li class="li_usuario">';

              echo '<p> <span>Nome:</span>' . $usuario->nome;
              echo '<p> <span>E-mail:</span>' . $usuario->email;

              echo '</li>';
            }


            ?>
             
               
              </div>
            </div>
          </li>
        </ul>
      </div>
    </main>
  </body>
</html>
