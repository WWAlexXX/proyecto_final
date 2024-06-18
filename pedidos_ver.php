<?php 
/*Se encarga de mostar los alumnos*/
include("conexion.php");
include("pedidos_tabla.php");
$pagina = $_GET['pag'];
$id = $_GET['id'];

$querybuscar = mysqli_query($conn, "SELECT ped.id,ped.nombre,direccion,telefono,post.nombre as postres ,beb.nombre as bebidas ,plat.nombre as platillos 
FROM pedidos ped, postres post, bebidas beb, platillos plat where ped.postres_id=post.id and ped.bebidas_id=beb.id and ped.platillos_id=plat.id and ped.id = '$id'");
 
while($mostrar = mysqli_fetch_array($querybuscar))
{
	$pedid 	= $mostrar['id'];
	$pednom	= $mostrar['nombre'];
	$peddir	= $mostrar['direccion'];
	$pedtel	= $mostrar['telefono'];
	$pedpost= $mostrar['postres'];
	$pedbeb = $mostrar['bebidas'];
	$pedplat= $mostrar['platillos'];
}
?>
<html>
<body>
<div class="caja_popup2">
<form class="contenedor_popup" method="POST">
<table>
<tr><th colspan="2">Ver Pedido</th></tr>
<tr> 
<td><b>Id:</b></td>
<td><?php echo $pedid;?></td>
</tr>		
<tr> 
<td><b>Nombre: </b></td>
<td><?php echo $pednom;?></td>
</tr>
<tr> 
<td><b>Dirección: </b></td>
<td><?php echo $peddir;?></td>
</tr>
<tr> 
<td><b>Telefono: </b></td>
<td><?php echo $pedtel;?></td>
</tr>
<tr> 
<td><b>Postre: </b></td>
<td><?php echo $pedpost;?></td>
</tr>
<tr> 
<td><b>Bebida: </b></td>
<td><?php echo $pedbeb;?></td>
</tr>
<tr> 
<td><b>Platillo: </b></td>
<td><?php echo $pedplat;?></td>
</tr>

<tr>
				
<td colspan="2">
<?php echo "<a class='BotonesTeam' href=\"pedidos_tabla.php?pag=$pagina\">Regresar</a>";?>
</td>
</tr>
</table>
</form>
</div>
</body>
</html>