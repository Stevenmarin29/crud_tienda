<head>
    <link rel="stylesheet" href="views/css/styles.css">
</head>


<!-- Mostrar mensaje de error si el correo ya está registrado -->
<?php if (isset($_GET["error"]) && $_GET["error"] == "email_existente"): ?>
    <p style="color: red;">Este correo ya está registrado. Intenta con otro.</p>
<?php endif; ?>

<h2>Registro</h2>
<form method="POST" action="index.php?action=register">
    <label>Nombre:</label>
    <input type="text" name="nombre" required>
    <br>
    <label>Email:</label>
    <input type="email" name="email" required>
    <br>
    <label>Contraseña:</label>
    <input type="password" name="password" required>
    <br>
    <button type="submit">Registrar</button>
</form>
<a href="index.php?action=login">¿Ya tienes cuenta? Inicia sesión</a>
