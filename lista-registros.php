<?php

require_once './src/functions/validaLogin.php';
require_once './src/repositorios/RegistroRepo.php';
require_once './src/servicos/DB.php';

validaLogin();

$dbService = new DBService();
$registroRepo = new RegistroRepo($dbService->getConn());


$registros = $registroRepo->findAll();

$idRegistro = isset($_GET['idRegistro']) ? $_GET['idRegistro'] : null;
$action = isset($_GET['action']) ? $_GET['action'] : null;


if (isset($idRegistro) && $action === 'remover') {
    $registroRepo->delete($idRegistro);
    header('Location: /p4/lista-registros.php');
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


    function removerUsuario(idUsuario) {
        url.searchParams.set('action', 'remover');
        url.searchParams.set('idRegistro', idUsuario);

        location.assign(url);
    }

    function handleModalClose() {
        window.location.href = '/p4/lista-registros.php'
    }

    function handleModalOpen(idRegistro) {
        url.searchParams.set('action', 'editar');
        url.searchParams.set('idRegistro', idRegistro);

        location.assign(url);
    }

    function handleAdicionarUsuario() {
        window.location.href = '/p4/adicionar-registro.php';
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
            <button onclick="handleLogOut()">
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
                        <button onclick="removerUsuario(<?php echo $registro->getId(); ?>)" class="lista-usuarios--item__actions--remover__btn">
                            remover
                        </button>
                        <button onclick="handleModalOpen(<?php echo $registro->getId(); ?>)" class="lista-usuarios--item__actions--editar__btn">
                            editar
                        </button>
                    </div>
                </li>



            <?php  } ?>

        </ul>

    </main>
    </form>
    </div>

    <?php if ($idRegistro && $action === 'editar') {


        $registroAserEditado = $registroRepo->findById($idRegistro);



    ?>
        <div id="modal-usuario">
            <div class="modal-usuario__actions">
                <h4>
                    Editar Registro
                </h4>

                <button onclick="handleModalClose()">fechar</button>
            </div>

            <form action="./src/casos-de-uso/edicao-registro/index.php" method="POST">
                <div class="form-control">
                    <label class="form-label">
                        Nome:
                    </label>
                    <input value="<?php echo $registroAserEditado->getNome(); ?>" name="nome" id="nome" />
                </div>
                <div class="form-control">

                    <label class="form-label">
                        Telefone:
                    </label>
                    <input value="<?php echo $registroAserEditado->getTelefone(); ?>" name="telefone" id="telefone" />
                </div>
                <div class="form-control">

                    <label class="form-label">
                        Deficiencia':
                    </label>
                    <input value="<?php echo $registroAserEditado->getDeficiencia(); ?>" name="deficiencia" id="deficiencia" />
                </div>
                <div class="form-control">

                    <label class="form-label">
                        Deficiencia':
                    </label>
                    <input type="date" value="<?php echo $registroAserEditado->getDataNascimento(); ?>" name="data_nascimento" id="data_nascimento" />
                </div>

                <input type="hidden" name="id" id="id" value="<?php echo $idRegistro; ?>" />
                <button type="submit">Salvar</button>

        </div>
    <?php } ?>
</body>

</html>