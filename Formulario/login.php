<?php
session_start();

// Conectamos a la base de datos (suponiendo que ya tienes una configurada)
// $conn = mysqli_connect("localhost", "usuario", "contraseña", "basedatos");

// Procesamos la autenticación
if (isset($_POST['user']) && isset($_POST['pwd'])) {
    $user = $_POST['user'];
    $pwd = $_POST['pwd'];

    // Verificamos si el usuario y la contraseña son válidos
    // (suponiendo que ya tienes una función para verificar la autenticación)
    // if (verificarAutenticacion($user, $pwd)) {
    if (true) { // Temporalmente, para probar la autenticación
        // Creamos la sesión
        $_SESSION['usuario'] = $user;
        $_SESSION['contraseña'] = $pwd;

        // Redireccionamos a la página de bienvenida
        header('Location: bienvenida.php');
        exit;
    } else {
        // Redireccionamos a la página de error
        header('Location: error.php');
        exit;
    }
}