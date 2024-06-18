<?php
/*Se encarga de eliminar postres*/
include('conexion.php');
include("barra_lateral.php");
$usuarioingresado = $_SESSION['usuarioingresando'];
$pagina = $_GET['pag'];
$id = $_GET['postres'];

mysqli_query($conn, "DELETE FROM postres WHERE id='$id'");
header("Location:postres_tabla.php?pag=$pagina");

?>