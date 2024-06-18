<?php
/*Se encarga de elimnar los alumnos*/
include("conexion.php");
include("barra_lateral.php");
$usuarioingresado = $_SESSION['usuarioingresando'];
$pagina = $_GET['pag'];
$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM pedidos WHERE id='$id'");
header("Location:pedidos_tabla.php?pag=$pagina");

?>