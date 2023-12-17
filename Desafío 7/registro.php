<?php
include 'db_config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['nuevo_usuario'];
    $password = $_POST['nueva_password'];

    // Hash de la contraseña (asegúrate de utilizar métodos seguros en producción)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insertar usuario en la base de datos
    $sql = "INSERT INTO usuarios (usuario, password) VALUES ('$usuario', '$hashed_password')";
    $result = $conn->query($sql);

    if ($result) {
        $_SESSION['usuario'] = ['usuario' => $usuario];
        header('Location: index.php');
        exit;
    } else {
        $mensajeError = "Error al registrar el usuario. Intenta de nuevo.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <h2>Registro</h2>

    <?php if (isset($mensajeError)) : ?>
        <p style="color: red;"><?php echo $mensajeError; ?></p>
    <?php endif; ?>

    <form action="" method="post">
        Nuevo Usuario: <input type="text" name="nuevo_usuario" required><br>
        Nueva Contraseña: <input type="password" name="nueva_password" required><br>
        <input type="submit" value="Registrarse">
    </form>

    <p>¿Ya tienes una cuenta? <a href="login.php">Inicia Sesión</a></p>
</body>
</html>
