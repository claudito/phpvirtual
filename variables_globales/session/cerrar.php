<?php 

session_start();

//session_destroy();

$key = "crud";

unset($_SESSION[$key.'nombres']);
unset($_SESSION[$key.'apellidos']);
unset($_SESSION[$key.'id']);
 ?>