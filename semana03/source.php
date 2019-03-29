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
		# code...
		break;
	case 2:
		# code...
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