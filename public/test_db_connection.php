<?php
class Database {
    private $host = "localhost";  // Make sure this matches your DB host
    private $db_name = "cart_php";  // Your DB name
    private $username = "root";  // DB user
    private $password = "root";  // DB password
    public $conn;

    public function getConnection(){
        $this->conn = null;
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
            echo "Database connected successfully!";
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}

// Instantiate and test the connection
$database = new Database();
$connection = $database->getConnection();
?>
