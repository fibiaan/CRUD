<?php
    include ("../db/database.php");
    $usuarios = new Database();
    
    if(isset($_POST) && !empty($_POST)){
        $user = $usuarios->sanitize($_POST['user']);
        $password = $usuarios->sanitize($_POST['password']);

        $res = $usuarios->readUser($user, $password);
    }else{
        echo 'else';
    }

?>