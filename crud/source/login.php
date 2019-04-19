<?php 

include'../config.php';
include'../modelo/Conexion.php';

$conexion =  new Conexion();
$conexion =  $conexion->get_conexion();

$usuario   =  trim($_REQUEST['usuario']);
$password  =  trim($_REQUEST['password']);
$password  =  md5($password);

try {

$query  =  "
SELECT 
id,
nombres,
apellidos,
dni,
usuario,
pass,
estado 
FROM  usuario WHERE usuario=:usuario AND pass=:password";

$statement = $conexion->prepare($query);
$statement->bindParam('usuario',$usuario);
$statement->bindParam('password',$password);
$statement->execute();
$result   = $statement->fetchAll(PDO::FETCH_ASSOC);


if(count($result)>0)
{

//Variables de Sesión
session_start();

$_SESSION[KEY.ID]        = $result[0]['id'];
$_SESSION[KEY.NOMBRES]   = $result[0]['nombres'];
$_SESSION[KEY.APELLIDOS] = $result[0]['apellidos'];

echo json_encode(

array(

'title'=>'Bienvenido',
'text' => $result[0]['nombres'].' '.$result[0]['apellidos'],
'type' =>'success'

)

);

}
else
{

echo json_encode(

array(

'title'=>'Acceso Denegado',
'text' => 'Usuario o Contraseña Incorrectos',
'type' =>'error'

)

);

}


} catch (Exception $e) {
	

echo json_encode(

array(

'title'=>'Error',
'text' => $e->getMessage(),
'type' =>'error'

)

);

}




 ?>