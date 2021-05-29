<?php
    include ("../db/database.php");
    $usuarios = new Database();
    
    if(isset($_POST) && !empty($_POST)){
        $user = $usuarios->sanitize($_POST['user']);
        $password = $usuarios->sanitize($_POST['password']);
        $name = $usuarios->sanitize($_POST['name']);

        $res = $usuarios->insert($name, $user, $password);
        if($res){
            $message = "Datos insertados";
        }else{
            $message = "No se pudieron ingresar los datos";
        }

        echo $message;
    }else{
        echo 'else';
    }

?>