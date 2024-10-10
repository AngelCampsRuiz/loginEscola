<?php
session_start();

if (isset($_SESSION['usuario'])) {
    echo 'Usuario registrado';
    echo '<br><br>';
    echo '<a href="cerrarSesion.php">Cerrar sesión</a>';
    echo ' | ';
    echo '<a href="formulario.php">Volver al formulario</a>';
} else {
    header('Location: formulario.php');
    exit;
}