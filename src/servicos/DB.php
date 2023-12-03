<?php



class DBService
{


    private  $conexao;
    private $usuario = 'root';
    private $senha = '';
    private $dsn = 'mysql:host=localhost;dbname=p4';

    private $sqlFolderBasePath = __DIR__ . '/../sql';


    public function __construct()
    {
        try {

            $this->connect();
            $this->createTables();
        } catch (PDOException $e) {
            print_r('Erro ao realizar a conexão com o banco de dados');
            print_r($e);
        }
    }

    public function getConn()
    {
        return $this->conexao;
    }

    private function connect()
    {
        $this->conexao = new PDO($this->dsn, $this->usuario, $this->senha);
    }

    private function createTables()
    {
        $queryCreateTableUsuarios = file_get_contents($this->sqlFolderBasePath . "/tabela-usuarios.sql");
        $queryCreateTableRegistros = file_get_contents($this->sqlFolderBasePath . "/tabela-registros.sql");


        $this->conexao->exec($queryCreateTableUsuarios);
        $this->conexao->exec($queryCreateTableRegistros);
    }

    public function __destruct()
    {
        $this->conexao = null;
    }
}
