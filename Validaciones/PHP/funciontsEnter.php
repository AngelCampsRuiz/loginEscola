<?php
    $error = '';
    function validarCampo($campo){
        if(empty($campo)){
            $error = true;
        } else {
            $error = false;
        }
        return $error;
    }