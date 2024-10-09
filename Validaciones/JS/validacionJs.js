function validarUser(){
    let user = document.getElementById("user").value;
    let errorUser = document.getElementById("errorUser");

    if(user == null || user.length == 0 || /^\s+$/.test(user)){
        errorUser.textContent = "El campo usuario no puede estar vacío.";
        return false;
    } else if(!isNaN(user)){
        errorUser.textContent = "El campo usuario no puede contener números.";
        return false;
    } else if(user.length < 2){
        errorUser.textContent = "El campo usuario debe tener al menos 2 caracteres.";
        return false;
    } else {
        errorUser.textContent = "";
        return true;
    }
}

function validarPwd(){
    let pwd = document.getElementById("pwd").value;
    let errorPwd = document.getElementById("errorPwd");

    if(pwd == null ||  pwd.length == 0 || /^\s+$/.test(pwd)){
        errorPwd.textContent = "El campo contraseña no puede estar vacío.";
        return false;
    } else if(pwd.length < 4){
        errorPwd.textContent = "El campo debe tener mas de 4 caracteres.";
        return false;
    } else {
        errorPwd.textContent = "";
        return true;
    }
}

function comprobarForm(event){
    event.preventDefault();

    if (validarUser() && validarPwd()){

        let user = document.getElementById("user").value;

        Swal.fire({
            title: "¡Formulario válido!",
            html: `
                <strong>Bienvenido:</strong> ${user}<br>
            `,
            icon: "success"
        }).then(() => {
            document.getElementById("login").submit();
        });
    }
}
document.getElementById("login").addEventListener("submit", comprobarForm);