<?php
/*Se encarga de eliminar los platillos*/
include('conexion.php');
include("barra_lateral.php");
$usuarioingresado = $_SESSION['usuarioingresando'];
$pagina = $_GET['pag'];
$id = $_GET['platillos'];

mysqli_query($conn, "DELETE FROM platillos WHERE id='$id'");
header("Location:platillos_tabla.php?pag=$pagina");

?>