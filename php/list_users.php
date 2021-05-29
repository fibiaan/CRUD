<?php
    include ("../db/database.php");
    $usuarios = new Database();
    $res = $usuarios->readUsers();
?>