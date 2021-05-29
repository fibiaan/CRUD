<?php
    include ("../db/database.php");
    $usuarios = new Database();
    $res = $usuarios->readUsers();

    while ($user = mysqli_fetch_assoc($res)){
        echo $user['name'];
    }
?>