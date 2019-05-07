<?php 

include'vendor/autoload.php';

$reniec  = new \Reniec\Reniec();

$dni     = "46794288";

$search = $reniec->search( $dni );
    

echo json_encode($search);




 ?>