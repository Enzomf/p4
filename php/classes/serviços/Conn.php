<?php
class Conn {
    private static $instance = null;
    private $host = "localhost";
    private $user = "enzo";
    private $password = "123456";
    private $database = "php_aulainicial";
    private $conn;

    private function __construct() {
        $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Conn();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->conn;
    }

    public function closeConnection() {
        mysqli_close($this->conn);
    }
}
 
?>