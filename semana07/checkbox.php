<?php 

//cadena
$producto = $_REQUEST['producto'];
$producto = implode('+', $producto);
echo $producto;

echo "<br>";

//Array
$producto = explode('+', $producto);

var_dump($producto);

/*
foreach ($producto as $key => $value) {
	 
// $query = "INSERT";

echo $value."<br>";


}*/




 ?>