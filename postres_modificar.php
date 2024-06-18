<?php 
/*Se encarga de la modificacion de los postres*/
include('conexion.php');
include("postres_tabla.php");

$pagina = $_GET['pag'];
$id = $_GET['postres'];

$querybuscar = mysqli_query($conn, "SELECT * FROM postres WHERE id = '$id'");
 
while($mostrar = mysqli_fetch_array($querybuscar))
{
  $postid	= $mostrar['id'];
  $postnom  = $mostrar['nombre'];
}
?>
<html>
<body>
<div class="caja_popup2">
<form class="contenedor_popup" method="POST">
<table>
<tr><th colspan="2">Modificar Postre</th></tr>
<tr> 
<td>Id</td>
<td><input class="CajaTexto" type="text" name="txtid" value="<?php echo $postid;?>" readonly></td>
</tr>
<tr> 
<td>Postre</td>
<td><input class="CajaTexto" type="text" name="txtnom" value="<?php echo $postnom;?>" required></td>

<tr>
				
<td colspan="2">
<?php echo "<a class='BotonesTeam' href=\"postres_tabla.php?pag=$pagina\">Cancelar</a>";?>&nbsp;
<input class="BotonesTeam" type="submit" name="btnmodificar" value="Modificar" onClick="javascript: return confirm('¿Deseas modificar este Postre?');">
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
      
$querymodificar = mysqli_query($conn, "UPDATE postres SET nombre='$nombre' WHERE id = '$id'");
echo "<script>window.location= 'postres_tabla.php?pag=$pagina' </script>";
    
}
?>