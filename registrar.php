
<?php
require_once 'conexion.php';

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nombre = trim($_POST['nombre'] ?? '');
    $descripcion = trim($_POST['descripcion'] ?? '');
    $precio = $_POST['precio'] ?? '';
    $categoria = trim($_POST['categoria'] ?? '');
    $existencias = $_POST['existencias'] ?? 0;
    $imagen = trim($_POST['imagen'] ?? '');

    if (
        $nombre !== '' &&
        is_numeric($precio) &&
        $precio >= 0 &&
        filter_var($existencias, FILTER_VALIDATE_INT) !== false &&
        $existencias >= 0
    ) {
        $sql = "INSERT INTO productos
        (nombre, descripcion, precio, categoria, existencias, imagen)
        VALUES (?, ?, ?, ?, ?, ?)";

        $consulta = $conexion->prepare($sql);

        $consulta->execute([
            $nombre,
            $descripcion,
            $precio,
            $categoria,
            $existencias,
            $imagen
        ]);

        $mensaje = "¡Postre registrado correctamente!";
    } else {
        $mensaje = "Revisa los datos. El nombre y el precio son obligatorios y los valores deben ser válidos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrar postre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<header>
<nav class="navbar">
<div class="container">
    <a class="navbar-brand" href="index.php">Dulce spot by Lola</a>
    <a class="nav-link" href="index.php">Inicio</a>
    <a class="nav-link" href="productos.php">Postres</a>
    <a class="nav-link" href="administrar.php">Administrar</a>
</div>
</nav>
</header>

<main class="container my-5">

    <div class="tarjeta mx-auto" style="max-width:600px">

        <h2 class="text-center mb-4">Registrar nuevo postre</h2>

        <?php if ($mensaje !== ''): ?>
            <div class="alert alert-info">
                <?= htmlspecialchars($mensaje) ?>
            </div>
        <?php endif; ?>

        <form method="POST">

            <label class="form-label">Nombre del postre</label>
            <input type="text" name="nombre" class="form-control mb-3" required>

            <label class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control mb-3"></textarea>

            <label class="form-label">Precio</label>
            <input type="number" name="precio" class="form-control mb-3" min="0" step="0.01" required>

            <label class="form-label">Categoría</label>
            <select name="categoria" class="form-select mb-3">
                <option value="Pasteles">Pasteles</option>
                <option value="Flanes">Flanes</option>
                <option value="Cheesecakes">Cheesecakes</option>
                <option value="Otros">Otros</option>
            </select>

            <label class="form-label">Existencias</label>
            <input type="number" name="existencias" class="form-control mb-3" min="0" value="0" required>

            <label class="form-label">URL de imagen (opcional)</label>
            <input type="url" name="imagen" class="form-control mb-3">

            <button type="submit" class="btn btn-rosa w-100">
                Guardar postre
            </button>

        </form>

    </div>

</main>

<footer>
    <p>© 2026 Dulce spot by Lola</p>
</footer>

</body>
</html>