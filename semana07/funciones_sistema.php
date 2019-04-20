<?php 


//Fechas
/*
date_default_timezone_set('America/Lima');
echo date_default_timezone_get();
echo "<br>";
echo date('Y-m-d H:i:s');*/

/*
$fecha = '20-04-2019';
echo $fecha;
echo "<br>";
echo date_format( date_create($fecha),'Y-m-d');
*/

/*
$fecha = '20/04/2019';
$fecha = str_replace('/', '-', $fecha);
echo $fecha;
echo "<br>";
echo date_format( date_create($fecha),'Y-m-d');
*/
/*
$fecha = '2019/04/20';


$year  = substr($fecha, 0,4);
$month = substr($fecha, 5,2);
$day   = substr($fecha, 8,2);

echo $year;
echo "<br>";
echo $month;
echo "<br>";
echo $day;

$fecha =  explode('/', $fecha);
echo $fecha[0];
echo "<br>";
echo $fecha[1];
echo "<br>";
echo $fecha[2];*/


#Contar caracteres
/*
$cadena = "    -    ";
$cadena = trim($cadena);

echo strlen($cadena);
echo "<br>";

//echo strlen($cadena);

if(strlen($cadena)>0)
{
  
  echo $cadena;

}
else
{
 
  echo "Cadena Vacía";

}



$numero = array('Juan','Perez','Maria','Diana');
echo     count($numero);
*/


//Convertir Array en Cadena;
/*

$productos =  array('Azul','Rojo','Amarillo','Verde');
//$productos =  array('Azul');
$productos =  implode('+', $productos);
echo $productos;*/

 
$mensaje = "Hola ";

$mensaje .= "Soy una ";

$mensaje .=  "Variable";

echo $mensaje;


 ?>