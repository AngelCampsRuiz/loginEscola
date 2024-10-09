<?php
    if(!filter_has_var(INPUT_POST, "enter")){
        header('Location: ../../Formulario/formulario.php');
        exit();
    } else {
        $errores = '';
        $user = $_POST['user'];
        $pwd = $_POST['pwd'];

        require_once './funciontsEnter.php';
        if(validarCampo($user)){
            if(!$errores){
                $errores .= "?userVacio=true";
            } else {
                $errores .= "&userVacio=true";
            }
        } else {
            if(!preg_match("/^[a-zA-Z0-9]*$/", $user)){
                $errores .= "?userError=true";
            } else {
                $errores .= "&userError=true";
            }
        }

        if(validarCampo($pwd)){
            if(!$errores){
                $errores .= "?pwdVacio=true";
            } else {
                $errores .= "&pwdVacio=true";
            }
        } else {
            if(!preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{4,}$/', $pwd)){
                $errores .= '?pwdError=true';
            } else {
                $errores .= '&pwdError=true';
            }
        }

        if($errores !== ''){
            $datosErrores = array(
                'user' => $user,
                'pwd'=> $pwd
            );

            $datosRecibir = http_build_query($datosErrores);
            if(strpos($errores, "?") !== false){
                header("Location: ../../Formulario/formulario.php" . $errores . "&" . $datosRecibir);
            } else {
                header("Location: ../../Formulario/formulario.php?" . $errores . "&" . $datosRecibir);
            }
            exit();
        } else {
            echo "<form id='comprobacionCheck' action='./comprobacion.php' method='POST'>";
            echo "<input type='hidden' name='user' value='" . htmlspecialchars($user) . "'>";
            echo "<input type='hidden' name='pwd' value='" . htmlspecialchars($pwd) . "'>";
            echo "</form>";
            echo "<script>document.getElementById('comprobacionCheck').submit();</script>";
        }
    }