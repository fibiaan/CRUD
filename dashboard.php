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
    $data = new Database();
    $res = $data->readData(null, null);

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
        include ("html/content/home.html");
    }else if($GLOBALS['page'] == 'create'){
        include ("html/content/create.html");
    }else if($GLOBALS['page'] == 'configure'){
        include ("html/content/configure.php");
    }else if($GLOBALS['page'] == 'sensores'){
        include ("html/content/sensores.php");
    }
    //Parte inferior
    include ("html/footer.html")
?>