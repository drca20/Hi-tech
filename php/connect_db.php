<?php
$server = "127.0.0.1:54713";
$username = "azure";
$pass = "6#vWHD_$";

$con = new mysqli($server,$username,$pass);
if($con->connect_error){
	echo "Unable to connect.<br/>";
}

$con->select_db("project");
?>
