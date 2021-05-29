<?php
    session_start();
    if(isset($_SESSION['name']) && isset($_SESSION['logged'])){
        $GLOBALS['name'] = $_SESSION['name'];
        $GLOBALS['type'] = $_SESSION['type'];
        $GLOBALS['user'] = $_SESSION['user'];
        if(isset($_GET['page'])){
            $GLOBALS['page'] = $_GET['page'];
        }else{
            $GLOBALS['page'] = 'home';
        }
    }else{
        if(!$_SESSION['logged']){
            header('Location: index.php');
        }
    }
    include ("db/database.php");
    $sensores = new Database();
    $res = $sensores->readData(null, null);

    if($res == null){
        $GLOBALS['data'] = True;
    }else{
        $GLOBALS['data'] = False;
    }
    //Parte superior
    include ("html/header.html");
    include ("html/navbar.php");
    //Contenido
    if($GLOBALS['page'] == 'home'){
        include ("html/home.html");
    }
    //Parte inferior
    include ("html/footer.html")
?>