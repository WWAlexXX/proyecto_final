<?php 
/*Se encarga de la modificacion de los platillos*/
include('conexion.php');
include("platillos_tabla.php");

$pagina = $_GET['pag'];
$id = $_GET['platillos'];

$querybuscar = mysqli_query($conn, "SELECT * FROM platillos WHERE id = '$id'");
 
while($mostrar = mysqli_fetch_array($querybuscar))
{
  $platid	= $mostrar['id'];
  $platnom  = $mostrar['nombre'];
}
?>
<html>
<body>
<div class="caja_popup2">
<form class="contenedor_popup" method="POST">
<table>
<tr><th colspan="2">Modificar Platillo</th></tr>
<tr> 
<td>Id</td>
<td><input class="CajaTexto" type="text" name="txtid" value="<?php echo $platid;?>" readonly></td>
</tr>
<tr> 
<td>Postre</td>
<td><input class="CajaTexto" type="text" name="txtnom" value="<?php echo $platnom;?>" required></td>

<tr>
				
<td colspan="2">
<?php echo "<a class='BotonesTeam' href=\"platillos_tabla.php?pag=$pagina\">Cancelar</a>";?>&nbsp;
<input class="BotonesTeam" type="submit" name="btnmodificar" value="Modificar" onClick="javascript: return confirm('¿Deseas modificar este Platillos?');">
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
      
$querymodificar = mysqli_query($conn, "UPDATE platillos SET nombre='$nombre' WHERE id = '$id'");
echo "<script>window.location= 'platillos_tabla.php?pag=$pagina' </script>";
    
}
?>