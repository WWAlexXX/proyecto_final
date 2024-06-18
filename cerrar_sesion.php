<?php
/*Se encarga de cerrar cesion en la pagina*/
session_start();
session_destroy();
header("Location: index.php");
exit;
?>