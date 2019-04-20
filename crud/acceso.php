<?php 

session_start();

if(!isset($_SESSION[KEY.ID]))
{

 header('Location: '.URL.'');

}



 ?>