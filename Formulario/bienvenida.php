<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
        if (isset($_SESSION['user'])) {// Comprueba si hay la vaiable user guardada en sesion.
            echo 'Usuario registrado: ' . $_SESSION['user'];
            echo '<br><br>';
            echo '<a href="cerrarSesion.php">Cerrar sesión</a>';
            echo ' | ';
            echo '<a href="formulario.php">Volver al formulario</a>';
            if (isset($_SESSION['success']) && $_SESSION['success']) {//comprueba si dentro de sesion hay succes
                unset($_SESSION['success']);// Elimina despues de traerla
                $user = htmlspecialchars($_SESSION['user']);
                echo "<script>var loginSuccess = true; var user = '$user';</script>";
            }
        } else {
            // Si no hay usuario en la sesión, redirigir al formulario de login
            header('Location: formulario.php');
            exit;
        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        if (typeof loginSuccess !== 'undefined' && loginSuccess) {//Si se ha iniciado sesión correctamente
            Swal.fire({
                title: '¡Buen trabajo, ' + user + '!',
                text: 'Sesión iniciada correctamente.',
                icon: 'success'
            });
        }
    </script>
</body>
</html>