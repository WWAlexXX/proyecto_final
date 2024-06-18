<?php 
/*Se encarga de mostrar la informacion de la tabla bebidas*/
include("conexion.php");
include("bebidas_tabla.php");
$pagina = $_GET['pag'];
$id 	= $_GET['bebidas'];

$querybuscar = mysqli_query($conn, "SELECT * FROM bebidas WHERE id = '$id'");
 
while($mostrar = mysqli_fetch_array($querybuscar))
{
	$bebid	= $mostrar['id'];
	$bebnom = $mostrar['nombre'];
}
?>
<html>
<body>
<div class="caja_popup2">
<form class="contenedor_popup" method="POST">
<table>
<tr><th colspan="2">Ver Bebidas</th></tr>
<tr> 
<td><b>Id:</b></td>
<td><?php echo $bebid;?></td>
</tr>
			
<tr> 
<td><b>Bebidas: </b></td>
<td><?php echo $bebnom;?></td>
</tr>
<tr>
				
<td colspan="2">
<?php echo "<a class='BotonesTeam' href=\"bebidas_tabla.php?pag=$pagina\">Regresar</a>";?>
</td>
</tr>
</table>
</form>
</div>
</body>
</html>