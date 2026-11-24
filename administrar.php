
<?php
require_once 'conexion.php';

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = (int)($_POST['id'] ?? 0);

    if (isset($_POST['eliminar'])) {

        $consulta = $conexion->prepare(
            "DELETE FROM productos WHERE id = ?"
        );

        $consulta->execute([$id]);

        $mensaje = "Producto eliminado.";

    } elseif (isset($_POST['actualizar'])) {

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
            $consulta = $conexion->prepare(
                "UPDATE productos SET nombre=?, descripcion=?,
                precio=?, categoria=?, existencias=?, imagen=?
                WHERE id=?"
            );

            $consulta->execute([
                $nombre,
                $descripcion,
                $precio,
                $categoria,
                $existencias,
                $imagen,
                $id
            ]);

            $mensaje = "Producto actualizado correctamente.";
        } else {
            $mensaje = "Verifica los datos antes de actualizar.";
        }
    }
}

$editar = null;

if (isset($_GET['editar'])) {
    $consulta = $conexion->prepare(
        "SELECT * FROM productos WHERE id = ?"
    );

    $consulta->execute([(int)$_GET['editar']]);
    $editar = $consulta->fetch(PDO::FETCH_ASSOC);
}

$productos = $conexion->query(
    "SELECT * FROM productos ORDER BY id DESC"
)->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administrar postres</title>
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
    <a class="nav-link" href="registrar.php">Registrar</a>
</div>
</nav>
</header>

<main class="container my-5">

    <h1 class="text-center mb-4">Administrar productos</h1>

    <?php if ($mensaje): ?>
        <div class="alert alert-info">
            <?= htmlspecialchars($mensaje) ?>
        </div>
    <?php endif; ?>

    <?php if ($editar): ?>

        <div class="tarjeta mb-4">

            <h3>Editar postre</h3>

            <form method="POST">

                <input type="hidden" name="id"
                value="<?= (int)$editar['id'] ?>">

                <label class="form-label">Nombre</label>
                <input class="form-control mb-3" name="nombre"
                value="<?= htmlspecialchars($editar['nombre']) ?>" required>

                <label class="form-label">Descripción</label>
                <textarea class="form-control mb-3"
                name="descripcion"><?= htmlspecialchars($editar['descripcion']) ?></textarea>

                <label class="form-label">Precio</label>
                <input type="number" min="0" step="0.01"
                class="form-control mb-3" name="precio"
                value="<?= htmlspecialchars($editar['precio']) ?>" required>

                <label class="form-label">Categoría</label>
                <input class="form-control mb-3" name="categoria"
                value="<?= htmlspecialchars($editar['categoria']) ?>">

                <label class="form-label">Existencias</label>
                <input type="number" min="0" class="form-control mb-3"
                name="existencias"
                value="<?= (int)$editar['existencias'] ?>" required>

                <label class="form-label">Imagen (URL)</label>
                <input type="url" class="form-control mb-3"
                name="imagen"
                value="<?= htmlspecialchars($editar['imagen']) ?>">

                <button class="btn btn-rosa" name="actualizar">
                    Guardar cambios
                </button>

                <a href="administrar.php" class="btn btn-secondary">
                    Cancelar
                </a>

            </form>

        </div>

    <?php endif; ?>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Existencias</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>

            <?php foreach ($productos as $producto): ?>

                <tr>
                    <td><?= (int)$producto['id'] ?></td>

                    <td>
                        <?= htmlspecialchars($producto['nombre']) ?>
                    </td>

                    <td>
                        $<?= number_format($producto['precio'], 2) ?>
                    </td>

                    <td><?= (int)$producto['existencias'] ?></td>

                    <td>
                        <a class="btn btn-warning btn-sm"
                        href="administrar.php?editar=<?= (int)$producto['id'] ?>">
                            Editar
                        </a>

                        <form method="POST" class="d-inline"
                        onsubmit="return confirm('¿Seguro que deseas eliminar este postre?')">

                            <input type="hidden" name="id"
                            value="<?= (int)$producto['id'] ?>">

                            <button class="btn btn-danger btn-sm"
                            name="eliminar">
                                Eliminar
                            </button>

                        </form>
                    </td>
                </tr>

            <?php endforeach; ?>

            </tbody>
        </table>
    </div>

</main>

<footer>
    <p>© 2026 Dulce spot by Lola</p>
</footer>

</body>
</html>