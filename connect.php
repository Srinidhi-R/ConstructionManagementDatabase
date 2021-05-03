<?php
//connect with the created database in phpmyadmin
$link = mysqli_connect("localhost","Srinidhi","Nidsri@06","construction");
//check connection
if($link == false){
	die("ERROR: Could not connect. ".mysqli_connect_error());
}
?>