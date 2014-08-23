<?php
	$server="localhost";
	$user  ="root";
	$pwd   ="";
	$bd    ="ptc";
	$conexion=mysqli_connect($server,$user,$pwd,$bd);
    mysqli_set_charset($conexion,"utf8");  
?>