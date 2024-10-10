<?php
// Función para encriptar la contraseña
function encriptar_password($pwd) {
    return password_hash($pwd, PASSWORD_DEFAULT);
}

// Función para verificar la contraseña
function verificar_password($pwd, $hashed_password) {
    return password_verify($pwd, $hashed_password);
}

if (isset($_POST['pwd']) && !empty($_POST['pwd'])) {
    $pwd = $_POST['pwd'];

    // Encriptamos la contraseña
    $hashed_password = encriptar_password($pwd);

    echo "Contraseña introducida: " . $pwd . "<br>";
    echo "Contraseña encriptada: " . $hashed_password . "<br>";

    // Verificamos la contraseña
    if (verificar_password($pwd, $hashed_password)) {
        echo "La contraseña es correcta.<br>";
    } else {
        echo "La contraseña es incorrecta.<br>";
    }
} else {
    echo "No se ha introducido ninguna contraseña";
}
?>