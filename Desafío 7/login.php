<?php
include 'db_config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    // Consultar usuario en la base de datos
    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['usuario'] = ['usuario' => $usuario];
            header('Location: index.php');
            exit;
        } else {
            $mensajeError = "Credenciales incorrectas. Intenta de nuevo.";
        }
    } else {
        $mensajeError = "Credenciales incorrectas. Intenta de nuevo.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>

    <?php if (isset($mensajeError)) : ?>
        <p style="color: red;"><?php echo $mensajeError; ?></p>
    <?php endif; ?>

    <form action="" method="post">
        Usuario: <input type="text" name="usuario" required><br>
        Contraseña: <input type="password" name="password" required><br>
        <input type="submit" value="Iniciar Sesión">
    </form>

    <p>¿No tienes una cuenta? <a href="registro.php">Regístrate</a></p>
    <p>o</p>
    <a href="github_login.php">Entrar con Github</a>
</body>
</html>
