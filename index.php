
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dulce spot by Lola</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet">

    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

<header>
    <nav class="navbar navbar-expand-lg">
        <div class="container">

            <a class="navbar-brand" href="index.php">
                Dulce spot by Lola
            </a>

            <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menu">

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Inicio</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="productos.php">Postres</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="registrar.php">Registrar</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="administrar.php">Administrar</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
</header>

<main>

    <section class="portada">
        <div class="container">

            <h1>¡Bienvenidos a Dulce spot by Lola!</h1>

            <p>
                Endulzamos tus momentos especiales
                con deliciosos postres.
            </p>

            <a href="productos.php" class="btn btn-rosa btn-lg">
                Ver nuestros postres
            </a>

        </div>
    </section>

    <section class="container text-center my-5">

        <h2>Sobre nosotros</h2>

        <p>
            Somos una tienda dedicada a la elaboración
            y venta de deliciosos postres, preparados
            con ingredientes de calidad y mucho cariño.
        </p>

        <h2 class="mt-5">Nuestros favoritos</h2>

        <div class="row mt-4">

            <div class="col-md-4">
                <div class="tarjeta">
                    <h4>Chocoflan</h4>
                    <p>Una deliciosa combinación de chocolate y flan.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="tarjeta">
                    <h4>Flan napolitano</h4>
                    <p>Suave, cremoso y con caramelo.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="tarjeta">
                    <h4>Besos de nuez</h4>
                    <p>Ricas galletas a base de nuez.</p>
                </div>
            </div>

        </div>

    </section>

</main>

<footer>
    <p>© 2026 Dulce spot by Lola | Todos los derechos reservados</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
