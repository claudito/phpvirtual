<?php 

include'modelo/Conexion.php';

$conexion = new Conexion();
$conexion = $conexion->get_conexion();

$opcion   = $_REQUEST['op'];

/*

1 =  lista de empleados
2 =  agregar y actualizar empleados
3 =  lista de sedes
4 =  lista de cargos
5 =  eliminar / inactivar empleados 

*/

switch ($opcion) {
	case 1:

try {
	
$query     =  "SELECT * FROM empleado";
$statement =  $conexion->prepare($query);
$statement->execute();
$result    =  $statement->fetchAll(PDO::FETCH_ASSOC);

$json = [

'sEcho'=>1,
'iTotalRecords'=>count($result),
'iTotalDisplayRecords'=>count($result),
'aaData'=>$result

];


echo json_encode($json);



} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();

}



		break;
	case 2:

	$accion            =  trim($_REQUEST['accion']);
	$nombres           =  trim($_REQUEST['nombres']);
	$apellidos         =  trim($_REQUEST['apellidos']);
	$fecha_nacimiento  =  trim($_REQUEST['fecha_nacimiento']);
	$fecha_ingreso     =  trim($_REQUEST['fecha_ingreso']);
	$salario           =  trim($_REQUEST['salario']);
	$cargo             =  trim($_REQUEST['cargo']);
	$sede              =  trim($_REQUEST['sede']);


	if($accion=='agregar')
	{
		//Agregar

try {

$query =  "INSERT INTO empleado
(nombres,apellidos,id_cargo,id_sede,fecha_nacimiento,fecha_ingreso,salario)
VALUES
(:nombres,:apellidos,:id_cargo,:id_sede,:fecha_nacimiento,:fecha_ingreso,:salario)";
$statement = $conexion->prepare($query);
$statement->bindParam(':nombres',$nombres);
$statement->bindParam(':apellidos',$apellidos);
$statement->bindParam(':id_cargo',$cargo);
$statement->bindParam(':id_sede',$sede);
$statement->bindParam(':fecha_nacimiento',$fecha_nacimiento);
$statement->bindParam(':fecha_ingreso',$fecha_ingreso);
$statement->bindParam(':salario',$salario);
$statement->execute();
echo "ok";


} catch (Exception $e) {

echo "Error: ".$e->getMessage();

}




	}
	else
	{

		//Actualizar


	}



		break;

	case 3:
	 
	try {
		
     $query     =  "SELECT * FROM sede";
     $statement = $conexion->prepare($query);
     $statement->execute();
     $result    = $statement->fetchAll(PDO::FETCH_ASSOC);

     echo json_encode($result);

	} catch (Exception $e) {
		
    echo "Error: ".$e->getMessage();

	}




		break;

	case 4:
	
    	try {
		
     $query     =  "SELECT * FROM cargo";
     $statement = $conexion->prepare($query);
     $statement->execute();
     $result    = $statement->fetchAll(PDO::FETCH_ASSOC);

     echo json_encode($result);

	} catch (Exception $e) {
		
    echo "Error: ".$e->getMessage();

	}



		break;

	case 5:
		# code...
		break;

	
	default:
	echo "opción no disponible";
		break;
}



 ?>