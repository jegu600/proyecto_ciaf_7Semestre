<?php
	 
	$mysqli = new mysqli('localhost', 'ciaf', 'ciaf', 'ciaf');
	$mysqli->set_charset("utf8");
	if($mysqli->connect_error){
		
		die('Error en la conexion' . $mysqli->connect_error);
		
	}
?>