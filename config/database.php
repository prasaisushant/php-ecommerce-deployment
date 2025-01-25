<?php
/**
 * Used to get a connection to the MySQL database.
 */
class Database {
    private $host = "mysql-service";  // Kubernetes service for MySQL
    private $db_name = "website";      // Database name
    private $username = "root";        // MySQL username
    private $password = "root";        // MySQL root password (update as needed)
    public $conn;

    // Get the db connection
    public function getConnection(){
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Set error mode to exception
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>
