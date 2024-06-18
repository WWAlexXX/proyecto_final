<?php 
/*Se encarga de mostrar la informacion de la tabla postres*/
include("conexion.php");
include("postres_tabla.php");
$pagina = $_GET['pag'];
$id 	= $_GET['postres'];

$querybuscar = mysqli_query($conn, "SELECT * FROM postres WHERE id = '$id'");
 
while($mostrar = mysqli_fetch_array($querybuscar))
{
	$postid	= $mostrar['id'];
	$postnom = $mostrar['nombre'];
}
?>
<html>
<body>
<div class="caja_popup2">
<form class="contenedor_popup" method="POST">
<table>
<tr><th colspan="2">Ver Postres</th></tr>
<tr> 
<td><b>Id:</b></td>
<td><?php echo $postid;?></td>
</tr>
			
<tr> 
<td><b>Postre: </b></td>
<td><?php echo $postnom;?></td>
</tr>
<tr>
				
<td colspan="2">
<?php echo "<a class='BotonesTeam' href=\"postres_tabla.php?pag=$pagina\">Regresar</a>";?>
</td>
</tr>
</table>
</form>
</div>
</body>
</html>