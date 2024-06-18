<?php 
/*Se encarga de mostrar la informacion de la tabla platillos*/
include("conexion.php");
include("platillos_tabla.php");
$pagina = $_GET['pag'];
$id 	= $_GET['platillos'];

$querybuscar = mysqli_query($conn, "SELECT * FROM platillos WHERE id = '$id'");
 
while($mostrar = mysqli_fetch_array($querybuscar))
{
	$platid	= $mostrar['id'];
	$platnom = $mostrar['nombre'];
}
?>
<html>
<body>
<div class="caja_popup2">
<form class="contenedor_popup" method="POST">
<table>
<tr><th colspan="2">Ver Platillos</th></tr>
<tr> 
<td><b>Id:</b></td>
<td><?php echo $platid;?></td>
</tr>
			
<tr> 
<td><b>Platillo: </b></td>
<td><?php echo $platnom;?></td>
</tr>
<tr>
				
<td colspan="2">
<?php echo "<a class='BotonesTeam' href=\"platillos_tabla.php?pag=$pagina\">Regresar</a>";?>
</td>
</tr>
</table>
</form>
</div>
</body>
</html>