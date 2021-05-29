<?php
date_default_timezone_set('America/Bogota');
class Database{
    private $con;
    private $dbhost="localhost";
    private $dbuser="root";
    private $dbpass="";
    private $dbname="arduino";

    function __construct(){
        $this->connect_db();
    }
    public function connect_db(){
        $this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
        if(mysqli_connect_error()){
            die("Conexión a la base de datos falló " . mysqli_connect_error() . mysqli_connect_errno());
        }
    }
    public function sanitize($var){
        $return = mysqli_real_escape_string($this->con,$var);
        return $return;
    }
    public function insert($name,$user,$password){
        $now = date("Y\-m\-d H\:i\:s");
        $sql = "INSERT INTO users (name,password,user,registro) values ('$name', '$password','$user','$now')";
        $rest = mysqli_query($this->con, $sql);

        if($rest){
            return true;
        }else{
            return false;
        }   
    }
    public function readUser($user, $password){
        $sql1 = "SELECT count(*) as conteo FROM users WHERE user='" . $user . "'";
        $rest = mysqli_query($this->con, $sql1);
        $datos = mysqli_fetch_array($rest);
        if($datos['conteo'] == 1 ){
            $sql2 = "SELECT * FROM users WHERE user = '" . $user . "' AND password = '" . $password . "'";
            $rest2 = mysqli_query($this->con, $sql2);
            $rest2 = mysqli_fetch_array($rest2);
            if($rest2 == null){
                echo "No coincide la contraseña.";
            }else{
                if(isset($rest2['name'])){
                    session_start();
                    $_SESSION['name'] = $rest2['name']; 
                    $_SESSION['type'] = $rest2['id_rol'];
                    $_SESSION['user'] = $rest2['user'];
                    $_SESSION['logged'] = True; 
                    header("Location:../index.php");
                }else{
                    echo "No coincide la contraseña.";
                }
            }
        }else{
            echo "No se encuentra el usuario.";
        }
    }
    public function readUsers(){
        $sql = "SELECT * FROM users";
        $res = mysqli_query($this->con, $sql);
        return $res;
    }
    public function readData($startDate, $endDate){
        $r = null;
        if($startDate == null && $endDate == null){
            $sql = "SELECT * FROM sensor";

        }else{
            if($startDate == null){
                $sql = "SELECT * FROM sensor WHERE registro <= " . $endDate; //
            }else if($endDate == null){
                $sql = "SELECT * FROM sensor WHERE registro >= " . $startDate;
            }else{
                $sql = "SELECT * FROM sensor WHERE registro BETWEEN " . $startDate . " AND " . $endDate;
            }
        }
        return $r;
    }
}
?>