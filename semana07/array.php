<?php 

 $array = array('Juan','Pedro','Maria','Pedro');
 
 //Fetch()
 $usuario = array
 (
  
 'codigo'   =>'46794282',
 'nombres'  =>'Luis Agusto',
 'apellidos'=>'Claudio Ponce'

 );

 //fetchAll()
 $lista =  array(
  
 array
 (
  
 'codigo'   =>'46794282',
 'nombres'  =>'Luis Agusto',
 'apellidos'=>'Claudio Ponce'

 ),
  array
 (
  
 'codigo'   =>'0000000',
 'nombres'  =>'Juan',
 'apellidos'=>'Perez'

 ),
  array
 (
  
 'codigo'   =>'55555',
 'nombres'  =>'Maria',
 'apellidos'=>'Prado'

 )

 );


 /*
 foreach ($array as $key => $value) {
 	
  echo $key.':'.$value.'<br>';

 }*/

 /*
 foreach ($usuario as $key => $value) {
 	
   echo $key.':'.$value.'<br>';

 }

*/

 foreach ($lista as $key => $value) {
 	
    echo $value['codigo'].'<br>';

 }




 ?>