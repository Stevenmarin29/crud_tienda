<?php
require_once "config/database.php";

class Producto {
    private $conn;
    private $table = "productos";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Obtener todos los productos
    public function obtenerProductos() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    // Agregar un producto
    public function agregarProducto($nombre, $precio) {
        $query = "INSERT INTO " . $this->table . " (nombre, precio) VALUES (:nombre, :precio)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":precio", $precio);
        return $stmt->execute();
    }

// Obtener un producto por su ID
public function obtenerProductoPorId($id) {
    $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


        // Actualizar un producto
    public function actualizarProducto($id, $nombre, $precio) {
        $query = "UPDATE " . $this->table . " SET nombre = :nombre, precio = :precio WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":precio", $precio);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Eliminar un producto por su ID
public function eliminarProducto($id) {
    $query = "DELETE FROM " . $this->table . " WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":id", $id);
    return $stmt->execute();
}

// Buscar productos por nombre
public function buscarProductos($termino) {
    $query = "SELECT * FROM " . $this->table . " WHERE nombre LIKE :termino";
    $stmt = $this->conn->prepare($query);
    $termino = "%$termino%";
    $stmt->bindParam(":termino", $termino);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}



}
?>