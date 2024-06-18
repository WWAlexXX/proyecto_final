<?php 
/*Se encarga de modificar la informacion de los alumnos*/
include("conexion.php");
include("pedidos_tabla.php");

$pagina = $_GET['pag'];
$id = $_GET['id'];

$querybuscar = mysqli_query($conn, "SELECT * FROM pedidos WHERE id = '$id'");
 
while($mostrar = mysqli_fetch_array($querybuscar))
{	
	$pedid 		= $mostrar['id'];
	$pednom 	= $mostrar['nombre'];
	$peddir 	= $mostrar['direccion'];
	$pedtel 	= $mostrar['telefono'];
	$pedpost 	= $mostrar['postres_id'];
	$pedbeb 	= $mostrar['bebidas_id'];
	$pedplat 	= $mostrar['platillos_id'];
}
?>
<html>
<body>
<div class="caja_popup2">
<form class="contenedor_popup" method="POST">
<table>
<tr><th colspan="2">Modificar infoPedido</th></tr>	
<tr> 
<td><b>Id: </b></td>
<td><input class="CajaTexto" type="number" name="txtid" value="<?php echo $pedid;?>" readonly></td>
</tr>
<tr> 
<td><b>Nombre: </b></td>
<td><input class="CajaTexto" type="text" name="txtnom" value="<?php echo $pednom;?>" required></td>
</tr>
<tr> 
<td><b>Dirección: </b></td>
<td><input class="CajaTexto" type="text" name="txtdir" value="<?php echo $peddir;?>" required></td>
</tr>
<tr> 
<td><b>Telefono: </b></td>
<td><input class="CajaTexto" type="number" step="any" name="txttel" value="<?php echo $pedtel;?>" required ></td>
</tr>
<tr> 
<td><b>Postres: </b></td>
<td>
<select name="txtpost" class='CajaTexto'>

<?php	
$qrpedidos = mysqli_query($conn, "SELECT * FROM postres ");
while($mostrarpost = mysqli_fetch_array($qrpedidos)) 
{ 
if($mostrarpost['id']==$pedpost)
{
echo '<option selected="selected" value="'.$mostrarpost['id'].'">' .$mostrarpost['nombre']. '</option>';
}
else
{
echo '<option value="'.$mostrarpost['id'].'">' .$mostrarpost['nombre']. '</option>';
}
}		
?> 

</select>
</td>
</tr>
<tr> 
<td><b>Bebidas: </b></td>
<td>
<select name="txtbeb" class='CajaTexto'>

<?php	
$qrpedidos = mysqli_query($conn, "SELECT * FROM bebidas ");
while($mostrarbeb = mysqli_fetch_array($qrpedidos)) 
{ 
if($mostrarbeb['id']==$pedbeb)
{
echo '<option selected="selected" value="'.$mostrarbeb['id'].'">' .$mostrarbeb['nombre']. '</option>';
}
else
{
echo '<option value="'.$mostrarbeb['id'].'">' .$mostrarbeb['nombre']. '</option>';
}
}		
?> 

</select>
</td>
</tr>
<tr> 
<td><b>Platillos: </b></td>
<td>
<select name="txtplat" class='CajaTexto'>

<?php	
$qrpedidos = mysqli_query($conn, "SELECT * FROM platillos ");
while($mostrarplat = mysqli_fetch_array($qrpedidos)) 
{ 
if($mostrarplat['id']==$pedplat)
{
echo '<option selected="selected" value="'.$mostrarplat['id'].'">' .$mostrarplat['nombre']. '</option>';
}
else
{
echo '<option value="'.$mostrarplat['id'].'">' .$mostrarplat['nombre']. '</option>';
}
}		
?> 

</select>
</td>
</tr>
<tr>
<td colspan="2" >
<?php echo "<a class='BotonesTeam' href=\"pedidos_tabla.php?pag=$pagina\">Cancelar</a>";?>&nbsp;
<input class='BotonesTeam' type="submit" name="btnregistrar" value="Modificar" onClick="javascript: return confirm('¿Deseas modificar la informacion del Pedido?');">
</td>
</tr>
</table>
</form>
</div>
</body>
</html>

<?php
	
if(isset($_POST['btnregistrar']))
{    
	$pedid1 	= $_POST['txtid'];
	$pednom1 	= $_POST['txtnom'];
	$peddir1	= $_POST['txtdir'];
	$pedtel1 	= $_POST['txttel'];
	$pedpost1 	= $_POST['txtpost'];
	$pedbeb1 	= $_POST['txtbeb'];
	$pedplat1 	= $_POST['txtplat'];
      
$querymodificar = mysqli_query($conn, "UPDATE pedidos SET nombre='$pednom1',direccion='$peddir1',telefono='$pedtel1',postres_id='$pedpost1',bebidas_id='$pedbeb1',platillos_id='$pedplat1' WHERE id = '$pedid1'");
echo "<script>window.location= 'pedidos_tabla.php?pag=$pagina' </script>";
    
}
?>