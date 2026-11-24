
<?php
require_once 'conexion.php';

$productos = $conexion->query(
    "SELECT * FROM productos ORDER BY id DESC"
)->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nuestros postres</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<header>
<nav class="navbar navbar-expand-lg">
<div class="container">
    <a class="navbar-brand" href="index.php">Dulce spot by Lola</a>
    <div class="navbar-nav ms-auto">
        <a class="nav-link" href="index.php">Inicio</a>
        <a class="nav-link" href="productos.php">Postres</a>
        <a class="nav-link" href="registrar.php">Registrar</a>
        <a class="nav-link" href="administrar.php">Administrar</a>
    </div>
</div>
</nav>
</header>

<main class="container my-5">

    <h1 class="text-center mb-4">Nuestro catálogo de postres</h1>
    <input
    type="text"
    id="buscador"
    class="form-control mb-4"
    placeholder="Buscar un postre..."
    onkeyup="buscarPostres()"
>

    <div class="row">

    <?php foreach ($productos as $producto): ?>

        <div class="col-md-4 tarjeta-producto">
            <div class="tarjeta">

                <?php if (!empty($producto['imagen'])): ?>
                    <img
                        src="<?= htmlspecialchars($producto['imagen']) ?>"
                        class="img-fluid rounded mb-3"
                        alt="Fotografía del postre"
                    >
                <?php endif; ?>

                <h4>
                    <?= htmlspecialchars($producto['nombre']) ?>
                </h4>

                <p>
                    <?= htmlspecialchars($producto['descripcion']) ?>
                </p>

                <p>
                    Categoría:
                    <?= htmlspecialchars($producto['categoria']) ?>
                </p>

                <h5>
                    $<?= number_format($producto['precio'], 2) ?>
                </h5>

                <p>
                    Existencias: <?= (int)$producto['existencias'] ?>
                </p>

            </div>
        </div>

    <?php endforeach; ?>

    </div>

    <?php if (count($productos) == 0): ?>
        <p class="text-center">
            Todavía no hay postres registrados.
        </p>
    <?php endif; ?>

</main>

<footer>
    <p>© 2026 Dulce spot by Lola</p>
</footer>
<script src="js/funciones.js"></script>

</body>
</html>