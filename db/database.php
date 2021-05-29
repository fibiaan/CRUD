<?php
//creamos la conexion a la base datos a traves POO
date_default_timezone_set('America/Bogota');
class Database{
    private $con;
    private $dbhost="localhost";
    private $dbuser="root";
    private $dbpass="";
    private $dbname="arduino"; //creamos las varibles

    function __construct(){
        $this->connect_db();
    }
    public function connect_db(){
        $this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
        if(mysqli_connect_error()){
            die("Conexión a la base de datos falló " . mysqli_connect_error() . mysqli_connect_errno());
        }
    }
    public function sanitize($var){// limpiar lo datos
        $return = mysqli_real_escape_string($this->con,$var);
        return $return;
    }
    public function insert($name,$user,$password){
        $now = date("Y\-m\-d H\:i\:s");
        $sql = "INSERT INTO users (name,password,user,registro) values ('$name', '$password','$user','$now')";
        $rest = mysqli_query($this->con, $sql);//hacer una consulta con las base de datos 

        if($rest){ //comprobar que los datos esten ahí
            return true;
        }else{
            return false;
        }   
    }
    public function readUser($user, $password){
        $sql1 = "SELECT count(*) as conteo FROM users WHERE user='" . $user . "'";
        echo $sql1 . "<br>";
        $rest = mysqli_query($this->con, $sql1);
        $datos = mysqli_fetch_array($rest);
        if($datos['conteo'] > 0){

        }else{
            
        }
    }
}
?>