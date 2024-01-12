<?php
  $server="localhost";
  $database="user";
  $user="root";
  $password="";
$con= mysqli_connect($server,$user,$password,$database);
if(!$con){
	die("not connected". mysqli_error($con));
}
echo "connected successfuly";




 ?>