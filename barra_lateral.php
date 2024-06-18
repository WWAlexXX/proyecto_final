<?php
/*Se encarga de mostrar la barra lateral*/
session_start();
include('conexion.php');
if(isset($_SESSION['usuarioingresando']))
{
$usuarioingresado = $_SESSION['usuarioingresando'];
$buscandousu = mysqli_query($conn,"SELECT * FROM usuarios WHERE correo = '".$usuarioingresado."'");
$mostrar=mysqli_fetch_array($buscandousu);
	
}else
{
	header('location: index.php');
}

?>

<html>
<head>
<title>Suggar Dreams</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="BarraLateral">

<ul>
<li><a href="pedidos_tabla.php" >• Pedidos</a></li>
<li><a href="postres_tabla.php" >• Postres</a></li>
<li><a href="bebidas_tabla.php" >• Bebidas</a></li>
<li><a href="platillos_tabla.php" >• Platillos</a></li>
<li><a href="cerrar_sesion.php" >• Cerrar sesión</a></li>
</ul>
<hr>
</div>
</body>
</html>