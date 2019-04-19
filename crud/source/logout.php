<?php 

include'../config.php';
session_start();

try {
	

echo json_encode(

array(

'type'=>'success',
'title'=>'Bye '.$_SESSION[KEY.NOMBRES].' '.$_SESSION[KEY.APELLIDOS]
)

);

unset($_SESSION[KEY.ID]);
unset($_SESSION[KEY.NOMBRES]);
unset($_SESSION[KEY.APELLIDOS]);


} catch (Exception $e) {
	
echo json_encode(

array(

'type'=>'error',
'title'=>$e->getMessage()
)

);




}





 ?>