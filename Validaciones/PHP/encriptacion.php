<?php
function encriptar_password($pwd) {//Encripta la contrasena
    return password_hash($pwd, PASSWORD_DEFAULT);
}

function verificar_password($pwd, $hashed_password) {// Verifica la contrasena es igual a que se ha encriptado
    return password_verify($pwd, $hashed_password);
}
