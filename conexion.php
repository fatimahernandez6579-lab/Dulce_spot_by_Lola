
<?php
$archivo = __DIR__ . '/tienda_postres.db';

try {
    $conexion = new PDO('sqlite:' . $archivo);

    $conexion->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

    $conexion->exec("
        CREATE TABLE IF NOT EXISTS productos (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            nombre TEXT NOT NULL,
            descripcion TEXT,
            precio REAL NOT NULL,
            categoria TEXT,
            existencias INTEGER DEFAULT 0,
            imagen TEXT
        )
    ");

} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
