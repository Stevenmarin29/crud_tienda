<?php
require_once "models/Producto.php";

class ProductController {
    public function index() {
        $producto = new Producto();
        $productos = $producto->obtenerProductos();
        include "views/productos/index.php";
    }

    public function create() {
        include "views/productos/create.php";
    }

    public function store() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre"];
            $precio = $_POST["precio"];
            $producto = new Producto();
            if ($producto->agregarProducto($nombre, $precio)) {
                header("Location: index.php");
            } else {
                echo "Error al agregar producto.";
            }
        }
    }

public function edit() {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
        $producto = new Producto();
        $productoData = $producto->obtenerProductoPorId($_POST["id"]);

        if ($productoData) {
            include "views/productos/edit.php";
        } else {
            echo "Producto no encontrado.";
        }
    } else {
        echo "Acceso no permitido.";
    }
}


    public function update() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST["id"];
            $nombre = $_POST["nombre"];
            $precio = $_POST["precio"];
            $producto = new Producto();
            if ($producto->actualizarProducto($id, $nombre, $precio)) {
                header("Location: index.php");
            } else {
                echo "Error al actualizar producto.";
            }
        }
    }

    public function delete() {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
        $producto = new Producto();
        if ($producto->eliminarProducto($_POST["id"])) {
            header("Location: index.php");
        } else {
            echo "Error al eliminar el producto.";
        }
    } else {
        echo "Acceso no permitido.";
    }
}

public function search() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $termino = $_POST["termino"];
        $producto = new Producto();
        $productos = $producto->buscarProductos($termino);
        include "views/productos/index.php";
    }
}


}
?>
