<?php 

session_start();

$key = "crud";

$id        =  "1";
$nombres   =  $_REQUEST['nombres'];
$apellidos =  $_REQUEST['apellidos'];

//Creación de variable de sesión
//Asignación de valor =
$_SESSION[$key.'id']        = $id;
$_SESSION[$key.'nombres']   = $nombres;
$_SESSION[$key.'apellidos'] = $apellidos;

//Impresión
//echo $_SESSION['nombres'];

//echo $_SESSION['apelidos'];
 ?>