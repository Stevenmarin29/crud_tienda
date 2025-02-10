<head>
    <link rel="stylesheet" href="views/css/styles.css">
</head>

<h2>Agregar Producto</h2>
<form method="POST" action="index.php?action=store">
    <label>Nombre:</label>
    <input type="text" name="nombre" required>
    <br>
    <label>Precio:</label>
    <input type="number" step="0.01" name="precio" required>
    <br>
    <button type="submit">Guardar</button>
</form>
<a href="index.php">Volver</a>
