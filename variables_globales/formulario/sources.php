<?php 

//GET $_GET['']

//POST $_POST['']

//GET POST $_REQUEST['']

/*
$nombres   = $_REQUEST['nombres'];

$apellidos = $_REQUEST['apellidos'];

echo $nombres.$apellidos;
*/

//var_dump($_REQUEST);

foreach ($_REQUEST as $key => $value) {

 echo $key.": ".$value."<br>";

//$statement->bindParam(':'.$key.'',$value);

}



 ?>