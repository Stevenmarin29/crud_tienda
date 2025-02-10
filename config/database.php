<?php
class Database {
    private $host = "localhost";  // Servidor de la base de datos
    private $dbname = "tienda";  // Nombre de la base de datos
    private $username = "root";  // Usuario de MySQL
    private $password = "";  // Contraseña de MySQL
    private $conn;  // Variable para almacenar la conexión

    public function getConnection() {
        $this->conn = null;

        try {
            // Crear la conexión usando PDO
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);
            
            // Configurar PDO para manejar errores de manera adecuada
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->exec("SET NAMES utf8"); // Configurar el juego de caracteres a UTF-8
            
        } catch (PDOException $exception) {
            echo "Error de conexión: " . $exception->getMessage();
        }

        return $this->conn;  // Retorna la conexión para su uso en otras clases
    }
}
?>
