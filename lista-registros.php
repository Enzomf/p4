<?php

require_once './src/functions/validaLogin.php';
require_once './src/repositorios/RegistroRepo.php';
require_once './src/servicos/DB.php';

validaLogin();

$dbService = new DBService();
$registroRepo = new RegistroRepo($dbService->getConn());


$registros = $registroRepo->findAll();


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="https://t4.ftcdn.net/jpg/06/50/47/01/240_F_650470107_hyNulX2cvkBkdRIANoHjkE0jLPw51Eu5.jpg" type="image/x-icon">

    <title>Usuarios</title>
    <link rel="stylesheet" type="text/css" href="./assets/style.css" />
</head>


<body>
    <header class="logo">
        <img src="https://images.even3.com.br/c1uz7AUsJZb735Q69CeyuTlRtD8=/fit-in/250x250/smart/even3.blob.core.windows.net/logos/logo2.a5ea37833ee949f08abf.png" alt="logo" />
    </header>
    <main id="usuarios">

        <h2 class="titulo">Seja bem-vindo, <?php echo $_SESSION['nome']; ?></h2>
        <nav>
            <h4>MENU</h4>
            <ul>
                <li>
                    <a href="./index.php">
                        USUARIOS
                    </a>
                </li>
                <li>
                    <a href="">
                        REGISTROS
                    </a>
                </li>
            </ul>
        </nav>

        <div id="actions">
            <a href="./adicionar-registro.php">
                <button>

                    Adicionar
                </button>
            </a>
            <button>
                sair
            </button>
        </div>


        <ul class="lista-usuarios">
            <?php foreach ($registros as $registro) { ?>

                <li class="lista-usuarios__item">
                    <div class="lista-usuarios--item__info">
                        <span>
                            <?php echo ($registro->getNome())  ?>
                        </span>
                        <span>
                            <?php echo ($registro->getTelefone())  ?>
                        </span>

                    </div>

                    <div class="lista-usuarios--item__actions">
                        <button onclick="removerUsuario(<?php echo $usuario->getId(); ?>)" class="lista-usuarios--item__actions--remover__btn">
                            remover
                        </button>
                        <button onclick="handleModalOpen(<?php echo $usuario->getId(); ?>)" class="lista-usuarios--item__actions--editar__btn">
                            editar
                        </button>
                    </div>
                </li>

            <?php  } ?>

        </ul>

    </main>
    </form>
    </div>
</body>

</html>