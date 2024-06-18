<?php
/*Se encarga de eliminar bebidas*/
include('conexion.php');
include("barra_lateral.php");
$usuarioingresado = $_SESSION['usuarioingresando'];
$pagina = $_GET['pag'];
$id = $_GET['bebidas'];

mysqli_query($conn, "DELETE FROM bebidas WHERE id='$id'");
header("Location:bebidas_tabla.php?pag=$pagina");

?>