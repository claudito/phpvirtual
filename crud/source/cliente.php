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


 case 2:

   
  $razon_social = trim($_REQUEST['razon_social']);
  $ruc          = trim($_REQUEST['ruc']);
  $estado       = trim($_REQUEST['estado']);
  $condicion    = trim($_REQUEST['condicion']);
  $oficio       = trim($_REQUEST['oficio']);

  if(substr($ruc, 0,2)=="10")
  {

   $dni = substr($ruc, 2);
   $dni = substr($dni, 0,8);

  }
  else
  {

   $dni = "";
 
  }



  try {
    
  $query  =  "SELECT * FROM cliente WHERE ruc=:ruc";
  $statement =  $conexion->prepare($query);
  $statement->bindParam(':ruc',$ruc);
  $statement->execute();

  $result = $statement->fetchAll(PDO::FETCH_ASSOC);

  if(count($result)>0)
  {

  echo json_encode(

array(

"title" => "El Cliente",
"text"  => "Ya está registrado",
"type"  => "info"

)

);
 

  }
  else
  {
 
 $query  =  "INSERT INTO cliente
(razon_social, ruc, estado, condicion, oficio,dni) 
VALUES
(:razon_social, :ruc, :estado, :condicion, :oficio,:dni)";
$statement =  $conexion->prepare($query);
$statement->bindParam(':razon_social',$razon_social);
$statement->bindParam(':ruc',$ruc);
$statement->bindParam(':estado',$estado);
$statement->bindParam(':condicion',$condicion);
$statement->bindParam(':oficio',$oficio);
$statement->bindParam(':dni',$dni);
$statement->execute();

echo json_encode(

array(

"title" => "Buen Trabajo",
"text"  => "Registro Agregado",
"type"  => "success"



)

);
 






  }
  


  } catch (Exception $e) {

  echo json_encode(

 array(
 
 "title" => "Error",
 "text"  => $e->getMessage(),
 "type"  => "error"


 )

 );

    
  }


 break;

case  3:

try {
  
$query     =  "  
SELECT 

id,
razon_social,
ruc,
dni,
estado,
condicion,
oficio

FROM cliente

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


	default:

echo "opción no disponible";

		break;
}






 ?>