<?php
/*Se encarga de la tabla de los platillos*/
include('conexion.php');
include("barra_lateral.php");
?>
<html>
<title>PLATILLOS</title>
<body>
<div class="ContenedorPrincipal">	
<?php
 
$filasmax = 7;
 
    if (isset($_GET['pag'])) 
	{
        $pagina = $_GET['pag'];
    } else 
	{
        $pagina = 1;
    }
 
 if(isset($_POST['btnbuscar']))
{
$buscar = $_POST['txtbuscar'];

 $sqlplat = mysqli_query($conn, "SELECT * FROM platillos where nombre like '".$buscar."%'");

}
else
{
 $sqlplat = mysqli_query($conn, "SELECT * FROM platillos ORDER BY id ASC LIMIT " . (($pagina - 1) * $filasmax)  . "," . $filasmax);
}
 
    $resultadoMaximo = mysqli_query($conn, "SELECT count(*) as num_platillos FROM platillos");
 
    $maxusutabla = mysqli_fetch_assoc($resultadoMaximo)['num_platillos'];
	
    ?>
	<div class="ContenedorTabla" >
	<form method="POST">
	<h1>PLATILLOS</h1>
	<div class="ContBuscar">
	<div style="float: left;">
	<a href="platillos_tabla.php" class="BotonesTeam">Inicio</a>
	<input class="BotonesTeam" type="submit" value="Buscar" name="btnbuscar">
	<input class="CajaTextoBuscar" type="text" name="txtbuscar"  placeholder="Ingresar platillo" autocomplete="off" >
	</div>
	<div style="float:right">
	<?php echo "<a class='BotonesTeam5' href=\"platillos_registrar.php?pag=$pagina\">Agregar platillo</a>";?>
	</div>
	</div>
</form>
    <table>
<tr>
<th>Id</th>
<th>Platillo</th>
<th>Acción</th>
</tr>
 
<?php
 
while ($mostrar = mysqli_fetch_assoc($sqlplat)) 
		{
			
echo "<tr>";
echo "<td>".$mostrar['id']."</td>";
echo "<td>".$mostrar['nombre']."</td>"; 
echo "<td style='width:24%'>
<a class='BotonesTeam1' href=\"platillos_ver.php?platillos=$mostrar[id]&pag=$pagina\">&#x1F50D;</a> 
<a class='BotonesTeam2' href=\"platillos_modificar.php?platillos=$mostrar[id]&pag=$pagina\">&#128397;</a> 
<a class='BotonesTeam3' href=\"platillos_eliminar.php?platillos=$mostrar[id]&pag=$pagina\" onClick=\"return confirm('¿Estás seguro de eliminar este platillo? $mostrar[nombre]?')\">&#10006;</a>
</td>";  
}

?>
</table>
<div style='text-align:right'>
<br>
<?php echo "Total de Platillos: ".$maxusutabla;?>
</div>
</div>
<div style='text-align:right'>
<br>
</div>
<div style="text-align:center">
<?php
if (isset($_GET['pag'])) {
if ($_GET['pag'] > 1) {
 ?>
<a class="BotonesTeam4" href="platillos_tabla.php?pag=<?php echo $_GET['pag'] - 1; ?>">Anterior</a>
<?php
} 
else 
{
?>
<a class="BotonesTeam4" href="#" style="pointer-events: none">Anterior</a>
<?php
}
?>
 
 <?php
} 
else 
{
?>
<a class="BotonesTeam4" href="#" style="pointer-events: none">Anterior</a>
<?php
}
 
if (isset($_GET['pag'])) {
if ((($pagina) * $filasmax) < $maxusutabla) {
?>
<a class="BotonesTeam4" href="platillos_tabla.php?pag=<?php echo $_GET['pag'] + 1; ?>">Siguiente</a>
<?php
} else {
?>
<a class="BotonesTeam4" href="#" style="pointer-events: none">Siguiente</a>
<?php
}
?>
<?php
} else {
?>
<a class="BotonesTeam4" href="platillos_tabla.php?pag=2">Siguiente</a>
<?php
}
?>
</div>
</div>
</body>
</html>