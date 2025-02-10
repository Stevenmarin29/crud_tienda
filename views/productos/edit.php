<head>
    <link rel="stylesheet" href="views/css/styles.css">
</head>

<h2>Editar Producto</h2>
<form method="POST" action="index.php?action=update">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($productoData['id']); ?>">

    <label>Nombre:</label>
    <input type="text" name="nombre" value="<?php echo htmlspecialchars($productoData['nombre']); ?>" required>
    <br>

    <label>Precio:</label>
    <input type="text" name="precio" value="<?php echo htmlspecialchars($productoData['precio']); ?>" required>
    <br>

    <button type="submit">Actualizar</button>
</form>
<a href="index.php">Volver</a>