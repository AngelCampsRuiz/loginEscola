function comprobarForm() {
    var user = document.getElementById('user').value;
    var pwd = document.getElementById('pwd').value;

    if (user == "" || pwd == "") {
        alert("Debes rellenar todos los campos");
        return false;
    }

    // Validamos el usuario
    if (!validarUser()) {
        return false;
    }

    // Validamos la contraseña
    if (!validarPwd()) {
        return false;
    }

    return true;
}

function validarUser() {
    var user = document.getElementById('user').value;
    var errorUser = document.getElementById('errorUser');

    if (user.length < 3) {
        errorUser.innerHTML = "El usuario debe tener al menos 3 caracteres";
        return false;
    }

    if (!/^[a-zA-Z]+$/.test(user)) {
 errorUser.innerHTML = "El usuario solo puede contener letras";
        return false;
    }

    errorUser.innerHTML = "";
    return true;
}

function validarPwd() {
    var pwd = document.getElementById('pwd').value;
    var errorPwd = document.getElementById('errorPwd');

    if (pwd.length < 8) {
        errorPwd.innerHTML = "La contraseña debe tener al menos 8 caracteres";
        return false;
    }

    if (!/^[a-zA-Z0-9]+$/.test(pwd)) {
        errorPwd.innerHTML = "La contraseña solo puede contener letras y números";
        return false;
    }

    errorPwd.innerHTML = "";
    return true;
}