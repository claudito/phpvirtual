<?php 

include'../vendor/autoload.php';
include'../modelo/Conexion.php';

$conexion = new Conexion();
$conexion = $conexion->get_conexion();

$opcion   = $_REQUEST['op'];


switch ($opcion) {
	case 1:

  $numero = trim($_REQUEST['numero']);

  try {

$company =  new \Sunat\Sunat(true,true);

$search  = $company->search($numero);

echo json_encode($search,true);

  	
  } catch (Exception $e) {
  	
  echo "Error: ".$e->getMessage();

  }



	break;

	default:

echo "opción no disponible";

		break;
}






 ?>