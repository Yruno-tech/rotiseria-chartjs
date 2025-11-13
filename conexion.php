<?php
$host = "sqlXXX.infinityfree.com";  // cambia XXX por tu host de InfinityFree
$user = "usuario_bd";              // tu usuario MySQL
$pass = "contraseña_bd";           // tu contraseña MySQL
$db   = "nombre_bd";               // tu base de datos (ej: if0_12345678_rotiseria)

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}
?>
