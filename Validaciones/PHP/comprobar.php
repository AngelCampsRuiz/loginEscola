<?php
session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require_once('../../MySql/conexion.php');
        if (isset($_POST['user']) && isset($_POST['pwd'])) {
            $user = trim($_POST['user']);
            $password = trim($_POST['pwd']);
            try {
                $stmt = $conexion->prepare("SELECT nom, pwd FROM tbl_administracio WHERE nom = :user");
                $stmt->bindParam(':user', $user, PDO::PARAM_STR);//Evita inyecciones a la base de datos
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);//Recupera los nombres que hay en la base de datos
                if ($row) {
                    $hashed_password = $row['pwd'];// Si se encuentra un usuario con el nombre introducido se comprueba la contraseña
                    if (password_verify($password, $hashed_password)) {//Si hay logueado se crea una sesión y se redirecciona a la página de bienvenida
                        $_SESSION['user'] = $user;
                        $_SESSION['success'] = true; 
                        header("Location: ../../Formulario/bienvenida.php");// Devuelve que no existe
                        exit();
                    }
                } else {
                    header("Location: ../../Formulario/formulario.php?error=2");
                    exit();
                }
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
                exit();
            }
        }
    }
