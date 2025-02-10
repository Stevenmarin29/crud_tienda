<?php
require_once "controllers/ProductController.php";
require_once "controllers/AuthController.php";

// Verificar si la sesión ya está iniciada antes de llamar a session_start()
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$action = isset($_GET["action"]) ? $_GET["action"] : "index";

$authController = new AuthController();

// Rutas de autenticación
if ($action == "register") {
    $authController->register();
    exit();
} elseif ($action == "login") {
    $authController->login();
    exit();
} elseif ($action == "logout") {
    $authController->logout();
    exit();
}

// Proteger las rutas del CRUD
if (!isset($_SESSION["usuario"])) {
    header("Location: index.php?action=login");
    exit();
}

$controller = new ProductController();
if (method_exists($controller, $action)) {
    $controller->$action();
} else {
    echo "Página no encontrada.";
}
?>
