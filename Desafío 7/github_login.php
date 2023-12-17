<?php
session_start();

// Simulación de inicio de sesión con Github
$github_username = "nombre_de_usuario_github"; // Reemplaza con tu nombre de usuario de Github
$_SESSION['usuario'] = ['usuario' => $github_username];
header('Location: index.php');
exit;
?>
