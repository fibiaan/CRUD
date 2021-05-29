<?php
    session_start();
    if(isset($_SESSION['name']) && isset($_SESSION['logged'])){
    }else{
        if(!$_SESSION['logged']){
            header('Location: index.php');
        }
    }
    include ("html/header.html");

    echo $_SESSION['name'];

    include ("html/logout.html")
?>
    
<?php
    include ("html/footer.html")
?>