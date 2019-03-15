<?php 

// Ñ Ó Ü

try {

$conexion = new PDO(

'mysql:host=localhost;dbname=datatable',
'root',
'',
array(
PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES UTF8'
)

);

$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


//Consulta de Datos
//Query
$query     =  "SELECT id,nombres,apellidos,dni FROM usuario";
//Setencia Preparada / Analisis del Query /SQL - COnsulta
$statement = $conexion->prepare($query);
//Ejecución del Query/Consulta
$statement->execute();

//Imprimir la información
//fetchAll() , me devuelve un array de datos

$result = $statement->fetchAll(PDO::FETCH_ASSOC);

//var_dump imprime la estructura de la variable
var_dump($result);





} catch (Exception $e) {

 echo 'Error: '.$e->getMessage();	
	
}






 ?>