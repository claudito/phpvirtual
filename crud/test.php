<?php 

include'vendor/autoload.php'; 

try {
	
//Creamos el Objeto que va a acceder a la información de la SUNAT
$company =  new \Sunat\Sunat(true,true);

//Parametro de Consulta :  RUC / DNI
$numero  = "46794282";

//La función search:Devuelve la información contribuyente (10, 20)
$search  = $company->search($numero);

//var_dump($search);

echo json_encode($search,true);


} catch (Exception $e) {
	
echo $e->getMessage();

}






 ?>