<?php

require_once './src/functions/validaLogin.php';
require_once './src/repositorios/UsuarioRepo.php';
require_once './src/servicos/DB.php';

validaLogin();

$dbService = new DBService();
$usuarioRepo = new UsuarioRepo($dbService->getConn());


$usuarios = $usuarioRepo->findAll();

$action = isset($_GET['action']) ? $_GET['action'] : null;
$idUsuario = isset($_GET['idUsuario']) ? $_GET['idUsuario'] : null;

if ($action === 'remover') {
    $usuarioRepo->delete($idUsuario);
    header('Location: /p4/index.php');
    return;
}

if ($action === 'logout') {
    session_destroy();
    header('Location: /p4/login.php');
}



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

<script>
    const url = new URL(location.href);

    console.log(url)

    function removerUsuario(idUsuario) {
        url.searchParams.set('action', 'remover');
        url.searchParams.set('idUsuario', idUsuario);

        location.assign(url);
    }

    function handleModalClose() {
        window.location.href = '/p4/usuarios.php'
    }

    function handleModalOpen(idUsuario) {
        url.searchParams.set('action', 'editar');
        url.searchParams.set('idUsuario', idUsuario);

        location.assign(url);
    }

    function handleAdicionarUsuario() {
        window.location.href = '/p4/cadastro.php';
    }

    function handleLogOut() {
        url.searchParams.set('action', 'logout');
        location.assign(url);


    }
</script>

<body>
    <header class="logo">
        <img src="https://images.even3.com.br/c1uz7AUsJZb735Q69CeyuTlRtD8=/fit-in/250x250/smart/even3.blob.core.windows.net/logos/logo2.a5ea37833ee949f08abf.png" alt="logo" />
    </header>
    <main id="usuarios">
        <h2 class="titulo">Seja bem-vindo, <?php echo $_SESSION['nome']; ?></h2>
        <div id="actions">
            <button onclick="handleAdicionarUsuario()">Adicionar</button>
            <button onclick="handleLogOut()">
                sair
            </button>
        </div>
        <ul class="lista-usuarios">
            <?php foreach ($usuarios as $usuario) { ?>

                <li class="lista-usuarios__item">
                    <div class="lista-usuarios--item__info">
                        <span>
                            <?php echo ($usuario->getNome())  ?>
                        </span>
                        <span>
                            <?php echo ($usuario->getEmail())  ?>
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



    <?php if ($idUsuario && $action === 'editar') {


        $usuarioAserEditado = $usuarioRepo->findById($idUsuario);



    ?>
        <div id="modal-usuario">
            <h4>
                Editar Usuario
            </h4>

            <form action="./src/casos-de-uso/edicao-usuario/index.php" method="POST">
                <div class="form-control">
                    <label class="form-label">
                        Nome:
                    </label>
                    <input value="<?php echo $usuarioAserEditado->getNome(); ?>" name="nome" id="nome" />
                </div>
                <div class="form-control">

                    <label class="form-label">
                        E-mail:
                    </label>
                    <input value="<?php echo $usuarioAserEditado->getEmail(); ?>" name="email" id="email" />
                </div>

                <input type="hidden" name="id" id="id" value="<?php echo $usuarioAserEditado->getId(); ?>" />
                <button type="submit">Salvar</button>

        </div>
    <?php } ?>


    </form>
    </div>
</body>

</html>