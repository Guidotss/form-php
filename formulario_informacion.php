<?php
// formulario_informacion.php

session_start();

if (!isset($_SESSION['nombre'])) {
    header("Location: index.php");
    exit();
}

$nombre = $_SESSION['nombre'];
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $datos = [];
    foreach ($_POST as $clave => $valor) {
        $datos[$clave] = htmlspecialchars($valor);
    }

    $mensaje .= "<h3>Datos Recibidos:</h3><ul class='list-group'>";
    foreach ($datos as $campo => $valor) {
        $mensaje .= "<li class='list-group-item'><strong>" . ucfirst($campo) . ":</strong> " . $valor . "</li>";
    }
    $mensaje .= "</ul>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Información Adicional</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Formulario de Información Adicional</h2>
        <?php
            if (!empty($mensaje)) {
                echo '<div class="alert alert-success">' . $mensaje . '</div>';
            }
        ?>
        <form method="POST" action="formulario_informacion.php">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo Electrónico:</label>
                <input type="email" class="form-control" id="correo" name="correo" required>
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono:</label>
                <input type="tel" class="form-control" id="telefono" name="telefono" required>
            </div>
            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección:</label>
                <input type="text" class="form-control" id="direccion" name="direccion" required>
            </div>
            <div class="mb-3">
                <label for="comentarios" class="form-label">Comentarios:</label>
                <textarea class="form-control" id="comentarios" name="comentarios" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Enviar</button>
        </form>

        <!-- Botón para Volver al Index -->
        <div class="mt-4">
            <a href="index.php" class="btn btn-secondary">Volver al Inicio</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
