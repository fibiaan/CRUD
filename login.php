<?php 
    session_start();
    if(isset($_SESSION['name']) && isset($_SESSION['logged'])){
        if($_SESSION['logged']){
            header('Location: dashboard.php');
        }
    }else{
    }
    include ("html/header.html");

    if(false){
        
    }else{
        include ("html/iniciar.html");
        
    }

?>



<?php
    include ("html/footer.html");
?>