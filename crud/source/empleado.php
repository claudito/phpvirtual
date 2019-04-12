<?php 

include'../modelo/Conexion.php';

$conexion = new Conexion();
$conexion = $conexion->get_conexion();

$opcion   = $_REQUEST['op'];

/*

1 =  lista de empleados
2 =  agregar y actualizar empleados
3 =  lista de sedes
4 =  lista de cargos
5 =  eliminar / inactivar empleados
6 =  Consulta de empleado por id

*/

switch ($opcion) {
	case 1:

try {
	
$query     =  "  
SELECT 

e.id,
e.nombres,
e.apellidos,
c.nombre  cargo ,
s.nombre sede,
DATE_FORMAT(e.fecha_nacimiento,'%d/%m/%Y') fecha_nacimiento,
DATE_FORMAT(e.fecha_ingreso,'%d/%m/%Y') fecha_ingreso,
CAST(e.salario AS decimal(8,2) ) salario,
DATE_FORMAT(e.dateCreate,'%d/%m/%Y %H:%i:%s') dateCreate

FROM empleado e

INNER JOIN cargo c  ON e.id_cargo=c.id

INNER JOIN sede s ON e.id_sede=s.id

";
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

echo json_encode(

array(

'title'=>'Buen Trabajo',
'text' =>'Registro Agregado',
'type' => 'success'

)

);




} catch (Exception $e) {

echo "Error: ".$e->getMessage();

}




	}
	else
	{

	$id = trim($_REQUEST['id']);

		//Actualizar

try {

$query =  "UPDATE empleado SET 
nombres  =:nombres,
apellidos=:apellidos,
id_cargo=:id_cargo,
id_sede=:id_sede,
fecha_nacimiento=:fecha_nacimiento,
fecha_ingreso=:fecha_ingreso,
salario=:salario 
WHERE id=:id";
$statement = $conexion->prepare($query);
$statement->bindParam(':nombres',$nombres);
$statement->bindParam(':apellidos',$apellidos);
$statement->bindParam(':id_cargo',$cargo);
$statement->bindParam(':id_sede',$sede);
$statement->bindParam(':fecha_nacimiento',$fecha_nacimiento);
$statement->bindParam(':fecha_ingreso',$fecha_ingreso);
$statement->bindParam(':salario',$salario);
$statement->bindParam(':id',$id);
$statement->execute();

echo json_encode(

array(

'title'=>'Buen Trabajo',
'text' =>'Registro Actualizado',
'type' => 'success'

)

);





} catch (Exception $e) {

echo "Error: ".$e->getMessage();

}


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

	$id  = trim($_REQUEST['id']);

	try {


	$query =  "DELETE FROM empleado WHERE id=:id";
	$statement = $conexion->prepare($query);
	$statement->bindParam(':id',$id);
	$statement->execute();


	echo json_encode(

	array(

	'title'=>'Buen Trabajo',
	'text' =>'Registro Eliminado',
	'type' => 'success'

	)

	);



		
	} catch (Exception $e) {
		

     echo "Error: ".$e->getMessage();

	}



	break;

	case 6:

	$id  =  trim($_REQUEST['id']);

	try {

	$query =  "SELECT 
     
     id,
     nombres,
     apellidos,
     id_cargo,
     id_sede,
     fecha_ingreso,
     fecha_nacimiento,
     dateCreate,
     CAST(salario AS decimal(8,2)) salario

	 FROM empleado WHERE id=:id";
	$statement = $conexion->prepare($query);
	$statement->bindParam(':id',$id);
	$statement->execute();

	$result  = $statement->fetch(PDO::FETCH_ASSOC);

    echo json_encode($result);
		
	} catch (Exception $e) {
		
     echo "Error: ".$e->getMessage();

	}


	break;

	
	default:
	echo "opción no disponible";
		break;
}



 ?>