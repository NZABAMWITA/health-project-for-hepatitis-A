<?php
  $server="localhost";
  $database="life";
  $user="root";
  $password="";
$con= mysqli-connection_aborted($server,$user,$password,$database);
if(!scon){
	die("not connected". mysqli_error($scon));
}
echo"connected successfuly";




 ?>