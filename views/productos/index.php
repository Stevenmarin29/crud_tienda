<head>
    <link rel="stylesheet" href="views/css/styles.css">
</head>


<h2>Lista de Productos</h2>


<!-- Formulario de búsqueda -->
<form method="POST" action="index.php?action=search">
    <input type="text" name="termino" placeholder="Buscar producto..." required>
    <button type="submit">Buscar</button>
</form>

<a href="index.php?action=create">Agregar Producto</a>
<a href="index.php?action=index" class="btn-listar">Listar Productos</a>
<a href="index.php?action=logout">Cerrar Sesión</a>


<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($productos as $producto): ?>
            <tr>
                <td><?php echo $producto["id"]; ?></td>
                <td><?php echo $producto["nombre"]; ?></td>
                <td><?php echo $producto["precio"]; ?></td>
                <td>
                <form method="POST" action="index.php?action=edit">
                    <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
                    <button type="submit">Editar</button>
                </form>
                </td>
                <td>
                <form method="POST" action="index.php?action=delete" onsubmit="return confirm('¿Estás seguro de eliminar este producto?');">
                    <input type="hidden" name="id" value="<?= $producto['id'] ?>">
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
