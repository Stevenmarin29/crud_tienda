<head>
    <link rel="stylesheet" href="views/css/styles.css">
</head>


<h2>Iniciar Sesión</h2>
<form method="POST" action="index.php?action=login">
    <label>Email:</label>
    <input type="email" name="email" required>
    <br>
    <label>Contraseña:</label>
    <input type="password" name="password" required>
    <br>
    <button type="submit">Iniciar sesión</button>
</form>
<a href="index.php?action=register">¿No tienes cuenta? Regístrate</a>
