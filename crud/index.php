<?php 

session_start();
include'config.php';

if( isset($_SESSION[KEY.ID]) )
{
 
 include'templates/home.php';

}
else
{

 include'templates/login.php';

}





 ?>