<?php 
/*Se encarga de la modificacion de las bebidas*/
include('conexion.php');
include("bebidas_tabla.php");

$pagina = $_GET['pag'];
$id = $_GET['bebidas'];

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
<tr><th colspan="2">Modificar Bebida </th></tr>
<tr> 
<td>Id</td>
<td><input class="CajaTexto" type="text" name="txtid" value="<?php echo $bebid;?>" readonly></td>
</tr>
<tr> 
<td>Bebida</td>
<td><input class="CajaTexto" type="text" name="txtnom" value="<?php echo $bebnom;?>" required></td>

<tr>
				
<td colspan="2">
<?php echo "<a class='BotonesTeam' href=\"bebidas_tabla.php?pag=$pagina\">Cancelar</a>";?>&nbsp;
<input class="BotonesTeam" type="submit" name="btnmodificar" value="Modificar" onClick="javascript: return confirm('¿Deseas modificar esta Bebida?');">
</td>
</tr>
</table>
</form>
</div>
</body>
</html>

<?php
	
if(isset($_POST['btnmodificar']))
{    
$id 		= $_POST['txtid'];
$nombre 	= $_POST['txtnom'];
      
$querymodificar = mysqli_query($conn, "UPDATE bebidas SET nombre='$nombre' WHERE id = '$id'");
echo "<script>window.location= 'bebidas_tabla.php?pag=$pagina' </script>";
    
}
?>