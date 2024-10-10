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
    <form action="validacionPhp.php" method="POST" id="login" onsubmit="return comprobarForm()">
        <label for="user">Usuario:</label><br><br>
        <input type="text" id="user" name="user" onblur="validarUser()" onkeyup="validarUser()"><br>
        <span id="errorUser" class="error"></span><br>
        <?php if (isset($_GET['userVacio'])) {
            echo 'Usuario vacio. Debes introducir un usuario valido.</br>';
        } ?>
        <?php if (isset($_GET['userError'])) {
            echo 'User no es valido. Solo permite letras.</br>';
        } ?>

        <label for="pwd">Contrasena:</label><br><br>
        <input type="password" id="pwd" name="pwd" onblur="validarPwd()" onkeyup="validarPwd()"><br>
        <span id="errorPwd" class="error"></span><br>
        <?php if (isset($_GET['pwdVacio'])) {
            echo 'Contrasena vacia. Debes introducir una contrasena valida.</br>';
        } ?>
        <?php if (isset($_GET['pwdError'])) {
            echo 'La contrasena no es valido. Debes introducir una contrasena valida.</br>';
        } ?>

        <input type="submit" name="enter" value="Verificar">
    </form>

    <script type="text/javascript" src="validacionJs.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>