<?php
/*Se encarga de verificar la conexion de la tabla*/
$host 	= 'localhost';
$nom 	= 'id22199907_proyecto';
$pass 	= 'Proyecto_final1';
$db 	= 'id22199907_proyecto_final';

$conn = mysqli_connect($host, $nom, $pass, $db);

if (!$conn) 
{
  die("Error en la conexión: " . mysqli_connect_error());
}	
?>