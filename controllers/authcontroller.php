<?php
require_once "models/Usuario.php";
session_start();

class AuthController {
    public function register() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre"];
            $email = $_POST["email"];
            $password = $_POST["password"];

            $usuario = new Usuario();

        // Verificar si el correo ya está registrado
        if ($usuario->verificarCorreoExistente($email)) {
            header("Location: index.php?action=register&error=email_existente");
            exit();
            return;
        }

            if ($usuario->registrarUsuario($nombre, $email, $password)) {
                header("Location: index.php?action=login");
                exit();
            } else {
                echo "Error al registrar usuario.";
            }
        }
        include "views/auth/register.php";
    }

    public function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST["email"];
            $password = $_POST["password"];

            $usuario = new Usuario();
            $user = $usuario->verificarCredenciales($email, $password);
            if ($user) {
                $_SESSION["usuario"] = $user;
                header("Location: index.php");
                exit();
            } else {
                echo "Credenciales incorrectas.";
            }
        }
        include "views/auth/login.php";
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: index.php?action=login");
        exit();
    }
}
?>
