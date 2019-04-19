<?php 

session_start();

$key = "crud";

if( isset($_SESSION[$key.'id']) )
{
  echo "home.php";
}
else
{
  
  echo "login.php";

}


 ?>