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
            if(!preg_match('/^[A-Za-z\s]{4,}$/', $user)){// Hace que la variable user solo sea letras
                $errores .= '?userError=true';
            }
        }

        if(validarCampo($pwd)){
            if(!$errores){
                $errores .= "?pwdVacio=true";
            } else {
                $errores .= "&pwdVacio=true";
            }
        }
        
        if($errores !== ''){
            $datosErrores = array(
                'user' => $user,
                'pwd'=> $pwd
            );

            $datosRecibir = http_build_query($datosErrores);//Transforma los errores en un url
            if(strpos($errores, "?") !== false){
                header("Location: ../../Formulario/formulario.php" . $errores . "&error=true&" . $datosRecibir);//Devuelve si hay errores
            } else {
                header("Location: ../../Formulario/formulario.php?" . $errores . "&error=true&" . $datosRecibir);
            }
            exit();
        } else {
            echo "<form id='comprobacionCheck' action='comprobar.php' method='POST'>";// Si todo esta correcto lo lleva a comprobar en la base de datos
            echo "<input type='hidden' name='user' value='" . htmlspecialchars($user) . "'>";
            echo "<input type='hidden' name='pwd' value='" . htmlspecialchars($pwd) . "'>";
            echo "</form>";
            echo "<script>document.getElementById('comprobacionCheck').submit();</script>";
        }
    }
