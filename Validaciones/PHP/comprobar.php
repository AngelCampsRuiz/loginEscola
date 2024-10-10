<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        require_once('../../MySql/conexion.php');
        if(isset($_POST['user']) && isset($_POST['pwd'])){
            $user = trim($_POST['user']);
            $password = trim($_POST['pwd']);
            try{
                $stmt = $conn->prepare("SELECT nom, pwd FROM tbl_administracio WHERE nom = ?");
                $stmt->bind_param("s", $user);
                $stmt->execute();
                $result = $stmt->get_result();
                if($result->num_rows > 0){
                    $row = $result->fetch_assoc();
                    $hashed_password = $row['pwd'];
                    if (password_verify($password, $hashed_password)) {
                        header("Location: pagina_destino.php");
                        exit();
                    } else {
                        header("Location:../../Formulario/formulario.php?error=Contraseña incorrecta. Por favor, inténtelo de nuevo.");
                    }
                } else {
                    header("Location:../../Formulario/formulario.php?error=Usuario no encontrado. Por favor, inténtelo de nuevo.");
                }
                $stmt->close();
                $conn->close();
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
                exit();
            }
        }
    }