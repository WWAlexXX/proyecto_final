<?php 
/*Se encarga de el registro de los postres*/
include('conexion.php');
include("postres_tabla.php");

$pagina = $_GET['pag'];
?>
<html>
<head>    
<title>POSTRES</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="caja_popup2"> 
<form class="contenedor_popup" method="POST">
<table>
<tr><th colspan="2" >Agregar Postre</th></tr>
<tr> 
<td>Postre</td>
<td><input type="text" name="txtnom" autocomplete="off" class="CajaTexto"></td>
</tr>
<tr> 	
<td colspan="2" >
<?php echo "<a class='BotonesTeam' href=\"postres_tabla.php?pag=$pagina\">Cancelar</a>";?>&nbsp;
<input class='BotonesTeam' type="submit" name="btnregistrar" value="Registrar" onClick="javascript: return confirm('¿Deseas registrar este postre?');">
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
	$vainom 	= $_POST['txtnom'];

	$queryadd	= mysqli_query($conn, "INSERT INTO postres(nombre) VALUES('$vainom')");
	
 	if(!$queryadd)
	{
		 echo "<script>alert('Id duplicado, intenta otra vez');</script>";
		 
	}else
	{
		echo "<script>window.location= 'postres_tabla.php?pag=1' </script>";
	}
}
?>
