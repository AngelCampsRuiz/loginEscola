<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="./../CSS/styles.css">
</head>
<body>
    <header>
        <img src="../Imagenes/LogoEscuela.jpeg" id="logo">
        <h2 id="iniciar-sesion">Iniciar sesión</h2>
    </header>
    <?php
    session_start();
    ?>
    <form action="../Validaciones/PHP/validacionPhp.php" method="POST" id="login" onsubmit="return comprobarForm()">
        <label for="user">Usuario:</label><br><br>
        <input type="text" id="user" name="user" value="<?php if (isset($_SESSION['usuario'])) echo $_SESSION['usuario']; ?>" onblur="validarUser()" onkeyup="validarUser()// Comprueba si esta correcto"><br>
        <span id="errorUser" class="error"></span><br>
        <?php if (isset($_GET['userVacio'])) {// Regresa y dice que el campo esta vacio
            echo '<p>Usuario vacio. Debes introducir un usuario valido.</p>';
        } ?>
        <?php if (isset($_GET['userError'])) {// Regresa y dice que el campo acepta solo letras
            echo '<p>User  no es valido. Solo permite letras.</p>';
        } ?>
        <label for="pwd">Contrasena:</label><br><br>
        <input type="password" id="pwd" name="pwd" onblur="validarPwd()" onkeyup="validarPwd()//Comprueba si esta correcto"><br>
        <span id="errorPwd" class="error"></span><br>
        <?php if (isset($_GET['pwdVacio'])) { // Dice que el campo esta vacio
            echo '<p>Contrasena vacia. Debes introducir una contrasena valida.</p>';
        } ?>
        <?php if (isset($_GET['pwdError'])) {// Dice que la contrasena no es valida
            echo '<p>La contrasena no es valido. Debes introducir una contrasena valida.</p>';
        } ?>
        <input type="submit" name="enter" value="Verificar">
    </form>
    <script type="text/javascript" src="../Validaciones/JS/validacionJs.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('error')) {// Viene de validaciones y dice que el formulario no esta correcto
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'No todo el formulario esta correcto',
            });
        }
        if (urlParams.get('error') === '2') {// Viene de comprueba y dice que los datos no son correctos
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Los datos ingresados no son correctos',
            });
        }
    </script>
</body>
</html>