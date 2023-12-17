<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}

$usuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
</head>
<body>
    <h2>Página Principal</h2>

    <p>Bienvenido, <?php echo $usuario['usuario']; ?></p>

    <p><a href="logout.php">Cerrar Sesión</a></p>
</body>
</html>
