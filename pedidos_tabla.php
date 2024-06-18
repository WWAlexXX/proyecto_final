<?php
/*Se encarga de la tabla de alumnos*/
include('conexion.php');
include("barra_lateral.php");
?>
<html>
<title>TUS PEDIDOS/SUGGAR DREAMS</title>
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

$sqlusu = mysqli_query($conn, "SELECT ped.id,ped.nombre,direccion,telefono,post.nombre as postres ,beb.nombre as bebidas ,plat.nombre as platillos 
FROM pedidos ped, postres post, bebidas beb, platillos plat where ped.postres_id=post.id and ped.bebidas_id=beb.id and ped.platillos_id=plat.id and ped.nombre like '".$buscar."%'");

}
else
{
	$sqlusu = mysqli_query($conn, "SELECT ped.id,ped.nombre,direccion,telefono,post.nombre as postres ,beb.nombre as bebidas ,plat.nombre as platillos  
	FROM pedidos ped, postres post, bebidas beb, platillos plat where ped.postres_id=post.id and ped.bebidas_id=beb.id and ped.platillos_id=plat.id ORDER BY ped.id ASC LIMIT " . (($pagina - 1) * $filasmax)  . "," . $filasmax);
}
 
    $resultadoMaximo = mysqli_query($conn, "SELECT count(*) as num_pedidos FROM pedidos");
 
    $maxusutabla = mysqli_fetch_assoc($resultadoMaximo)['num_pedidos'];
	
    ?>
	<div class="ContenedorTabla">
	<form method="POST">
	<h1>TUS PEDIDOS</h1>
	
	<div class="ContBuscar">
	<div style="float: left;">
	<a href="pedidos_tabla.php" class="BotonesTeam">Inicio</a>
	<input class="BotonesTeam" type="submit" value="Buscar" name="btnbuscar">
	<input class="CajaTextoBuscar" type="text" name="txtbuscar"  placeholder="Ingresa el nombre de el cliente" autocomplete="off" >
	</div>
	<div style="float:right;">
	<?php echo "<a class='BotonesTeam5' href=\"pedidos_registrar.php?pag=$pagina\">Agregar Pedido</a>";?>
	</div>
	</div>
			</form>
    <table>
			<tr>
			<th>Id</th>
			<th>Nombre</th>
            <th>Dirección</th>
			<th>Telefono</th>
			<th>Postre</th>
			<th>Bebida</th>
			<th>Platillo</th>
			<th>Acción</th>
			</tr>
 
        <?php
 
        while ($mostrar = mysqli_fetch_assoc($sqlusu)) 
		{
			
            echo "<tr>";
            echo "<td>".$mostrar['id']."</td>";
			echo "<td>".$mostrar['nombre']."</td>";
			echo "<td>".$mostrar['direccion']."</td>";
			echo "<td>".$mostrar['telefono']."</td>";
			echo "<td>".$mostrar['postres']."</td>";
			echo "<td>".$mostrar['bebidas']."</td>";
			echo "<td>".$mostrar['platillos']."</td>";
            echo "<td style='width:24%'>
			<a class='BotonesTeam1' href=\"pedidos_ver.php?id=$mostrar[id]&pag=$pagina\">&#x1F50D;</a> 
			<a class='BotonesTeam2' href=\"pedidos_modificar.php?id=$mostrar[id]&pag=$pagina\">&#128397;</a> 
			<a class='BotonesTeam3' href=\"pedidos_eliminar.php?id=$mostrar[id]&pag=$pagina\" onClick=\"return confirm('¿Estás seguro de eliminar el pedido $mostrar[nombre]?')\">&#10006;</a>
			</td>";  
			
        }
 
        ?>
    </table>
	<div style='text-align:right'>
	<br>
	<?php echo "Total de pedidos: ".$maxusutabla;?>
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
<a class="BotonesTeam4" href="pedidos_tabla.php?pag=<?php echo $_GET['pag'] - 1; ?>">Anterior</a>
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
<a class="BotonesTeam4" href="pedidos_tabla.php?pag=<?php echo $_GET['pag'] + 1; ?>">Siguiente</a>
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
<a class="BotonesTeam4" href="pedidos_tabla.php?pag=2">Siguiente</a>
<?php
}
?>
</div>
</div>
</body>
</html>