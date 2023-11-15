<?php
class Conn
{
    private static $instance = null;
    private $host = "db";
    private $user = "p4";
    private $password = "p4";
    private $database = "p4";
    private $conn;

    public function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        if (!$this->conn) {
            throw new Exception("" . mysqli_connect_error());
        }

        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new Conn();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }

    public function closeConnection()
    {
        mysqli_close($this->conn);
    }
}

?>