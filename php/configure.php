<?php
    include ("../db/database.php");
    $update = new Database();
    $res = $update->updateData($_POST['name'], $_POST['id_rol']); 
    if($res == true){
        echo "actualizó";
    }else {
        echo "No actualizó";
    }
?>