<?php
session_start();

session_destroy();// Se destruye la session

header('Location: formulario.php');
exit;
?>