<?php

define('SERVIDOR','database');
define('USUARIO','root');
define('PASSWORD','docker');
define('BD','gers_certificados');

$servidor = "mysql:dbname=".BD.";host=".SERVIDOR;

try{
    $pdo = new PDO($servidor,USUARIO,PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
    //echo "La conexion de la base de datos fue con exito";
}catch (PDOException $e) {
    print_r($e);
    echo "error al conectar a la base de datos";
}

$URL = "https://" . $_SERVER['HTTP_HOST'] . "/certificados" ;

date_default_timezone_set("America/Bogota");
$fechaHora = date('y-m-d h:i:s');
