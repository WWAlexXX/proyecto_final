<?php 
/*Se encarga de registrar los alumnos*/
include("conexion.php");
include("pedidos_tabla.php");
$pagina = $_GET['pag'];
?>
<html>
<body>
<div class="caja_popup2">
<form class="contenedor_popup" method="POST">
<table>
<tr><th colspan="2">Agregar Pedido</th></tr>	
<tr> 
<td><b>Nombre: </b></td>
<td><input type="text" name="txtnom" autocomplete="off" class="CajaTexto"></td>
</tr>
<tr> 
<td><b>Dirección: </b></td>
<td><input type="text" name="txtdir" autocomplete="off" class="CajaTexto"></td>
</tr>
<tr> 
<td><b>Telefono: </b></td>
<td><input type="number" name="txttel" autocomplete="off" class="CajaTexto" step="any"></td>
</tr>
<tr> 
<td><b>Postre: </b></td>
<td>
<select name="txtpost" class='CajaTexto'>
<?php
		
$qrpostres = mysqli_query($conn, "SELECT * FROM postres ");
while($mostrarpost = mysqli_fetch_array($qrpostres)) 
{ 
echo '<option value="'.$mostrarpost['id'].'">' .$mostrarpost['nombre']. '</option>';
}
?>  
</select>
</td>
</tr>
<tr> 
<td><b>Bebida: </b></td>
<td>
<select name="txtbeb" class='CajaTexto'>
<?php
		
$qrbebidas = mysqli_query($conn, "SELECT * FROM bebidas ");
while($mostrarbeb = mysqli_fetch_array($qrbebidas)) 
{ 
echo '<option value="'.$mostrarbeb['id'].'">' .$mostrarbeb['nombre']. '</option>';
}
?>  
</select>
</td>
</tr>
<tr> 
<td><b>Platillo: </b></td>
<td>
<select name="txtplat" class='CajaTexto'>
<?php
		
$qrplatillos = mysqli_query($conn, "SELECT * FROM platillos ");
while($mostrarplat = mysqli_fetch_array($qrplatillos)) 
{ 
echo '<option value="'.$mostrarplat['id'].'">' .$mostrarplat['nombre']. '</option>';
}
?>  
</select>
</td>
</tr>
<tr>
				
<td colspan="2" >
<?php echo "<a class='BotonesTeam' href=\"pedidos_tabla.php?pag=$pagina\">Cancelar</a>";?>&nbsp;
<input class='BotonesTeam' type="submit" name="btnregistrar" value="Registrar" onClick="javascript: return confirm('¿Deseas registrar este pedido ?');">
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
	$pednom 	= $_POST['txtnom'];
    $peddir 	= $_POST['txtdir'];
	$pedtel 	= $_POST['txttel'];
	$pedpost 	= $_POST['txtpost'];
	$pedbeb 	= $_POST['txtbeb'];
	$pedplat 	= $_POST['txtplat'];
   
	mysqli_query($conn, "INSERT INTO pedidos(nombre,direccion,telefono,postres_id,bebidas_id,platillos_id) VALUES('$pednom','$peddir','$pedtel','$pedpost','$pedbeb','$pedplat')");
	
	echo "<script> alert('Pedido registrado con exito: $pednom'); window.location='pedidos_tabla.php' </script>";
}
?>