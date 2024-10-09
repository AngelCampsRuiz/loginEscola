<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="login-container">
        <h2>Inicio de sesión</h2>
        <form id="loginForm">
            <div class="form-group">
                <label for="user">Usuario:</label>
                <input type="text" id="user" name="user" required>
            </div>
            <div class="form-group">
                <label for="pwd">Contraseña:</label>
                <input type="password" id="pwd" name="pwd" required>
            </div>
            <button type="submit">Login</button>
        </form>
        <p id="message"></p>
    </div>
</body>
</html>
